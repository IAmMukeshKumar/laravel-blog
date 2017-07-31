<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Comment;

class ApproveCommentController extends Controller
{
    //Approve comment
    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = $comment->status ? 0 : 1;
        $comment->update();

        return back()->with('success', 'Comment status was changed successfully');
    }

    //Delete comment
    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comment was deleted successfully');
    }
}
