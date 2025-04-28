<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showMaterial($id)
    {
        $material = Material::with('exams')->findOrFail($id);
        return view('student.materials.show', compact('material'));
    }

    public function submitExam(Request $request, $id)
    {
        $material = Material::findOrFail($id);

        $score = 0;
        foreach ($material->exams as $index => $exam) {
            $answer = $request->input('answers.' . $exam->id);
            if ($answer === $exam->correct_answer) {
                $score++;
            }
        }

        $percentage = ($score / count($material->exams)) * 100;

        return redirect()->back()->with('success', "Jawaban berhasil dikumpulkan. Skor kamu: {$score}/5 ({$percentage}%)");
    }
}
