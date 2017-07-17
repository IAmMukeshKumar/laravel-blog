<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Comment;

class ApproveCommentController extends Controller
{
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = 1;
        $comment->update();

        return back()->with('success', 'Comment approved');

    }

    public function delete($id)
    {

        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comment deleted');
    }
}
