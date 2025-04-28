<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetualanganController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $currentLevel = $user->level;

        // Ambil semua soal untuk level saat ini
        $soals = DB::table('soals')
            ->where('level', $currentLevel)
            ->where('tipe_game', 'petualangan')
            ->get();

        if ($soals->isEmpty()) {
            return view('quiz.petualangan_selesai', [
                'skor' => $user->xp,
                'level' => $currentLevel,
                'user' => $user
            ]);
        }

        return view('quiz.petualangan_arena', compact('soals', 'user'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'jawaban' => 'required|array',
            'jawaban.*' => 'in:opsi_a,opsi_b,opsi_c,opsi_d',
        ]);

        $user = auth()->user();
        $currentLevel = $user->level;

        // Simpan jawaban dan berikan XP
        foreach ($request->jawaban as $soal_id => $jawaban_user) {
            $soal = DB::table('soals')->where('id', $soal_id)->first();
            $jawaban_benar_column = 'opsi_' . strtolower($soal->jawaban_benar);
            $jawaban_benar = strtolower($soal->{$jawaban_benar_column});
            $jawaban_user = strtolower($soal->{$jawaban_user});

            // Jika jawaban benar, berikan XP
            $benar = $jawaban_user === $jawaban_benar;
            if ($benar) {
                $user->xp += 10;
            }
        }

        $user->save();

        // Update progress untuk soal yang sudah dijawab
        $progress = DB::table('progress_petualangan')
            ->where('user_id', $user->id)
            ->where('level', $currentLevel)
            ->first();

        $soal_ids = $progress && $progress->soal_ids ? explode(',', $progress->soal_ids) : [];

        foreach ($request->jawaban as $soal_id => $jawaban) {
            if (!in_array($soal_id, $soal_ids)) {
                $soal_ids[] = $soal_id;
            }
        }

        $new_soal_ids = implode(',', $soal_ids);

        if ($progress) {
            DB::table('progress_petualangan')
                ->where('id', $progress->id)
                ->update(['soal_ids' => $new_soal_ids]);
        } else {
            DB::table('progress_petualangan')->insert([
                'user_id' => $user->id,
                'level' => $currentLevel,
                'soal_ids' => $new_soal_ids,
                'created_at' => now(),
            ]);
        }

        // Periksa apakah semua soal sudah dijawab
        $total_soal = DB::table('soals')
            ->where('level', $currentLevel)
            ->where('tipe_game', 'petualangan')
            ->count();

        if (count($soal_ids) >= $total_soal) {
            return view('quiz.petualangan_selesai', [
                'skor' => $user->xp,
                'level' => $currentLevel,
                'user' => $user
            ]);
        }

        return redirect()->route('quiz.petualangan.index');
    }

    public function map()
    {
        $user = auth()->user();

        $progress = DB::table('progress_petualangan')
            ->where('user_id', $user->id)
            ->pluck('level')
            ->toArray();

        $levels = range(1, 10);

        return view('quiz.petualangan_map', compact('levels', 'progress', 'user'));
    }

    public function submitLevel(Request $request)
    {
        $user = auth()->user();
        $currentLevel = $user->level;

        DB::table('users')->where('id', $user->id)->update([
            'level' => $currentLevel + 1
        ]);

        return redirect()->route('quiz.petualangan.map')->with('level_up', true);
    }

    public function resetProgress()
    {
        $user = auth()->user();

        $user->level = 1;
        $user->xp = 0;
        $user->save();

        DB::table('progress_petualangan')->where('user_id', $user->id)->delete();

        return redirect()->route('quiz.petualangan.map')->with('status', 'Progress telah di-reset. Mulai dari Level 1!');
    }
}
