<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


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

        $posts = Post::where('status', 0)->where(function ($query) use ($request) {
            if ($request->has('title'))
                $query->where('title', 'like', '%' . $request->input('title') . '%');
            if ($request->has('body'))
                $query->where('body', 'like', '%' . $request->input('body') . '%');
        })->when($request->has('status'), function ($query) use ($request) {
            return $query;
        })->latest()->with('categories')->paginate((int)$paginate);


        return view('posts.public.index', ['posts' => $posts]);
    }

    public function showCategoryPosts($id,$slug)
    {
        $category = Category::findOrFail($id)->load(['posts'=>function($query)
    {
      $query->where('status',0);
    }]);
        return view('posts.public.CategoryRelatedPosts',compact('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $post = Post::findOrFail($id);

        if($post->status==0)
        {
            if ($slug !== str_slug($post->title)) {
                return redirect(route('publicpost.show', ['id' => $post->id, 'slug' => str_slug($post->title)]), 301);
            }
            $comments = $post->comments;
            return view('posts.public.show', ['post' => $post, 'comments' => $comments]);
        }
        else{
            return back();
        }


    }

}
