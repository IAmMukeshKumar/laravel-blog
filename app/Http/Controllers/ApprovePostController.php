<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ApprovePostController extends Controller
{
    //Approve post
    public function approve($id)
    {
        $post = Post::findOrFail($id);
        $post->status = $post->status ? 0 : 1;
        $post->update();

        return back()->with('success', 'Status has been changed successfully');
    }
}
