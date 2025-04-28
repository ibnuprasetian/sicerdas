<?php

namespace App\Http\Controllers\Student;

use App\Models\Discussion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'sub_materi_id' => 'required|exists:sub_materis,id',
            'message' => 'required|string',
        ]);

        \App\Models\Discussion::create([
            'sub_materi_id' => $request->sub_materi_id,
            'user_id' => auth()->id(),
            'message' => $request->message,
            'parent_id' => null,
        ]);

        return back();
    }
    public function reply(Request $request)
    {
        $request->validate([
            'parent_id' => 'required|exists:discussions,id',
            'message' => 'required|string',
        ]);

        \App\Models\Discussion::create([
            'user_id' => auth()->id(),
            'sub_materi_id' => \App\Models\Discussion::find($request->parent_id)->sub_materi_id,
            'message' => $request->message,
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }
}
