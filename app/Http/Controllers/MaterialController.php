<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index()
{
    $materials = Material::where('teacher_id', Auth::id())->get();
    return view('teacher.materials.index', compact('materials'));
}

public function create()
{
    return view('teacher.materials.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'youtube_url' => 'required|url',
        'questions.*.question' => 'required',
        'questions.*.option_a' => 'required',
        'questions.*.option_b' => 'required',
        'questions.*.option_c' => 'required',
        'questions.*.correct_answer' => 'required|in:A,B,C',
    ]);

    $material = Material::create([
        'teacher_id' => Auth::id(),
        'title' => $request->title,
        'content' => $request->content,
        'youtube_url' => $request->youtube_url,
    ]);

    foreach ($request->questions as $question) {
        $material->exams()->create($question);
    }

    return redirect()->route('teacher.materials')->with('success', 'Materi berhasil ditambahkan');
}

}
