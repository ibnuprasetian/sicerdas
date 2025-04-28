<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('subMateris')->get();
        return view('student.materi.index', compact('materis'));
    }

    public function show($id)
    {
        $materi = Materi::with([
            'subMateris.discussions.replies.user',
            'subMateris.discussions.user'
        ])->findOrFail($id);

        return view('student.materi.show', compact('materi'));
    }
}
