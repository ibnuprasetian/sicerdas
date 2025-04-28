<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function start()
    {
        $userId = Auth::id();
        $currentLevel = DB::table('progress_petualangan')
            ->where('user_id', $userId)
            ->value('level') ?? 'mudah';

        $soal = DB::table('soals')
            ->where('level', $currentLevel)
            ->inRandomOrder()
            ->first();

        return view('quiz.game', compact('soal', 'currentLevel'));
    }

    public function answer(Request $request)
    {
        $userId = Auth::id();
        $soalId = $request->soal_id;
        $jawaban = $request->jawaban;

        $soal = DB::table('soals')->where('id', $soalId)->first();

        if (strtolower($jawaban) == strtolower($soal->jawaban)) {
            // Update progress
            $nextLevel = $this->getNextLevel($soal->level);

            DB::table('progress_petualangan')->updateOrInsert(
                ['user_id' => $userId],
                ['level' => $nextLevel]
            );

            return redirect()->route('game.start')->with('success', 'Jawaban benar! Naik ke level berikutnya.');
        } else {
            return back()->with('error', 'Jawaban salah! Coba lagi.');
        }
    }

    private function getNextLevel($current)
    {
        return match($current) {
            'mudah' => 'sedang',
            'sedang' => 'sulit',
            'sulit' => 'selesai',
            default => 'mudah'
        };
    }
}
