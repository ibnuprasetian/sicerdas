<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizDashboardController extends Controller
{
    public function index()
    {
        return view('quiz.dashboard'); // pastikan file view ini ada
    }
}

