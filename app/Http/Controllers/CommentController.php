<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;
use App\Guest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $postId)
    {
        Post::findOrfail($postId);

        //Store guest
        $guest = new Guest;
        $guest->email = $request->email;
        $guest->name = $request->name;
        $guest->save();

        // Store comment
        $comment = new Comment;
        $comment->ip_address = $request->ip();
        $comment->post_id = $postId;
        $comment->guest_id = $guest->id;
        $comment->body = $request->comment;
        $comment->save();

        return back()->with('success', 'Your comment has been send for approval');

    }
}
