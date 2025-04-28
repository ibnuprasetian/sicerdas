<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultiplayerController extends Controller
{
    // Mengecek apakah sudah dapat lawan (AJAX)
    public function checkMatch()
    {
        $hasMatch = DB::table('battle_log')
            ->where('user_id', auth()->id())
            ->whereNotNull('match_id')
            ->exists();

        return response()->json([
            'status' => $hasMatch ? 'ready' : 'waiting'
        ]);
    }

    // Menampilkan leaderboard multiplayer
    public function leaderboard()
    {
        $leaderboard = DB::table('battle_log')
            ->join('users', 'battle_log.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('SUM(battle_log.score) as total_score'))
            ->groupBy('battle_log.user_id', 'users.name')
            ->orderByDesc('total_score')
            ->limit(10)
            ->get();

        return view('quiz.multiplayer_leaderboard', compact('leaderboard'));
    }

    // Halaman utama multiplayer (arena atau waiting)
    public function index()
    {
        // Ambil soal secara acak khusus untuk mode multiplayer
        $soal = DB::table('soals')
            ->where('tipe_game', 'multiplayer')
            ->inRandomOrder()
            ->first();

        $timer_duration = 30; // detik

        // Cek apakah ada pemain lain yang sedang menunggu
        $waiting_player = DB::table('battle_log')
            ->whereNull('match_id')
            ->where('user_id', '!=', auth()->id())
            ->first();

        if ($waiting_player) {
            // Match ditemukan
            $match_id = uniqid('match_');

            // Update pemain yang menunggu
            DB::table('battle_log')
                ->where('id', $waiting_player->id)
                ->update(['match_id' => $match_id]);

            // Tambahkan user saat ini ke match
            DB::table('battle_log')->insert([
                'user_id' => auth()->id(),
                'jawaban_user' => null,
                'score' => 0,
                'match_id' => $match_id,
                'created_at' => now(),
            ]);

            return view('quiz.multiplayer_arena', compact('soal', 'timer_duration', 'match_id'));
        } else {
            // Tambahkan ke waiting list
            DB::table('battle_log')->insert([
                'user_id' => auth()->id(),
                'jawaban_user' => null,
                'score' => 0,
                'match_id' => null,
                'created_at' => now(),
            ]);

            return view('quiz.multiplayer_waiting');
        }
    }

    // Simpan jawaban dan skor
    public function submit(Request $request)
    {
        $request->validate([
            'jawaban' => 'required|string',
        ]);

        $soal = DB::table('soals')->where('id', $request->id)->first();
        $benar = strtolower($request->jawaban) === strtolower($soal->jawaban);

        DB::table('battle_log')
            ->where('user_id', auth()->id())
            ->where('soal_id', $soal->id)
            ->whereNull('jawaban_user')
            ->update([
                'jawaban_user' => $request->jawaban,
                'score' => $benar ? 10 : 0,
            ]);

        return redirect()->route('multiplayer.result');
    }

    // Tampilkan hasil pertandingan
    public function result()
    {
        $match_id = DB::table('battle_log')
            ->where('user_id', auth()->id())
            ->whereNotNull('match_id')
            ->orderByDesc('created_at')
            ->value('match_id');

        if (!$match_id) {
            return redirect()->route('multiplayer.index')->with('status', 'Match belum dimulai.');
        }

        $players = DB::table('battle_log')
            ->join('users', 'battle_log.user_id', '=', 'users.id')
            ->select('users.name', 'battle_log.user_id', DB::raw('SUM(score) as total_score'))
            ->where('match_id', $match_id)
            ->groupBy('battle_log.user_id', 'users.name')
            ->get();

        if ($players->count() < 2) {
            return view('quiz.multiplayer_result_waiting'); // tunggu lawan selesai
        }

        $current_user_id = auth()->id();
        $you = $players->firstWhere('user_id', $current_user_id);
        $opponent = $players->firstWhere('user_id', '!=', $current_user_id);

        $status = 'Seri!';
        if ($you->total_score > $opponent->total_score) $status = 'Kamu Menang!';
        elseif ($you->total_score < $opponent->total_score) $status = 'Kamu Kalah!';

        return view('quiz.multiplayer_result', compact('you', 'opponent', 'status'));
    }
}
