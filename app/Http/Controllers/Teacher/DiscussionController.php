<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Materi;
use App\Models\Discussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function index()
    {
        $materis = Materi::all();
        return view('teacher.diskusi.index', compact('materis'));
    }

    public function show($id)
    {
        $materi = Materi::with('subMateris.discussions.replies.user', 'subMateris.discussions.user')->findOrFail($id);
        return view('teacher.diskusi.show', compact('materi'));
    }

    public function reply(Request $request)
    {
        $request->validate([
            'parent_id' => 'required|exists:discussions,id',
            'message' => 'required|string'
        ]);

        Discussion::create([
            'sub_materi_id' => Discussion::findOrFail($request->parent_id)->sub_materi_id,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Balasan berhasil dikirim.');
    }
}
