<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    public function index()
    {
        $soals = DB::table('soals')->orderBy('level')->get();
        return view('teacher.quiz.index', compact('soals'));
    }

    public function create()
    {
        return view('teacher.quiz.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
            'level' => 'required|integer|min:1',
            'tipe_game' => 'required|in:petualangan,multiplayer',
        ]);

        DB::table('soals')->insert([
            'pertanyaan' => $request->pertanyaan,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'jawaban_benar' => $request->jawaban_benar,
            'level' => $request->level,
            'tipe_game' => $request->tipe_game,
        ]);

        return redirect()->route('teacher.quiz.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $soal = DB::table('soals')->where('id', $id)->first();
        if (!$soal) return redirect()->route('teacher.quiz.index')->with('error', 'Soal tidak ditemukan.');

        return view('teacher.quiz.edit', compact('soal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
            'level' => 'required|integer|min:1',
            'tipe_game' => 'required|in:petualangan,multiplayer',
        ]);

        DB::table('soals')->where('id', $id)->update([
            'pertanyaan' => $request->pertanyaan,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'jawaban_benar' => $request->jawaban_benar,
            'level' => $request->level,
            'tipe_game' => $request->tipe_game,
        ]);

        return redirect()->route('teacher.quiz.index')->with('success', 'Soal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('soals')->where('id', $id)->delete();
        return redirect()->route('teacher.quiz.index')->with('success', 'Soal berhasil dihapus.');
    }
}
