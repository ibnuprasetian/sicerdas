<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\SubMateri;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('subMateris')->get();
        return view('teacher.materi.index', compact('materis'));
    }

    public function create()
    {
        return view('teacher.materi.create');
    }

    public function store(Request $request)
    {
        $materi = Materi::create($request->only('judul', 'deskripsi'));

        foreach ($request->sub_judul as $index => $judul) {
            SubMateri::create([
                'materi_id' => $materi->id,
                'judul' => $judul,
                'deskripsi' => $request->sub_deskripsi[$index],
                'youtube_link' => $request->youtube_link[$index]
            ]);
        }

        return redirect()->route('teacher.materi.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $materi = Materi::with('subMateris')->findOrFail($id);
        return view('teacher.materi.edit', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);
        $materi->update($request->only('judul', 'deskripsi'));

        // Hapus submateri lama
        $materi->subMateris()->delete();

        // Tambah ulang submateri
        foreach ($request->sub_judul as $index => $judul) {
            SubMateri::create([
                'materi_id' => $materi->id,
                'judul' => $judul,
                'deskripsi' => $request->sub_deskripsi[$index],
                'youtube_link' => $request->youtube_link[$index]
            ]);
        }

        return redirect()->route('teacher.materi.index')->with('success', 'Materi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('teacher.materi.index')->with('success', 'Materi berhasil dihapus.');
    }
}
