<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->has('paginate') ? $request->input('paginate') : 5;

        $posts = Post::
        where(function ($query) use ($request) {
            if ($request->has('title'))
                $query->where('title', 'like', '%' . $request->input('title') . '%');
            if ($request->has('body'))
                $query->where('body', 'like', '%' . $request->input('body') . '%');
        })
            ->when($request->has('status'), function ($query) use ($request) {
                return $query->where('status', '=', 1);
            })->paginate((int)$paginate);

        return view('posts.public.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.public.show', compact('post'));
    }

}
