<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\CategoryPost;


class PostAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->has('paginate') ? $request->input('paginate') : 5;

        $posts = Post::where(function ($query) use ($request) {
            if ($request->has('title'))
                $query->where('title', 'like', '%' . $request->input('title') . '%');
            if ($request->has('body'))
                $query->where('body', 'like', '%' . $request->input('body') . '%');
        })->when($request->has('status'), function ($query) use ($request) {
            return $query->where('status', '=', 1);
        })->with('categories')->with('user')->withCount('comments');

        if (!auth()->user()->is_admin) {
            $posts = $posts->where('user_id', auth()->user()->id);
        }

        $posts = $posts->latest()->paginate((int)$paginate);

        return view('posts.admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('posts')->orderBy('title')->get();

        return view('posts.admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($request->hasFile('imageUpload')) {
            $image = $request->imageUpload;

            $thumbnail = \Image::make($image)->resize(50, 50);
            $medium = \Image::make($image)->resize(200, 200);
            $large = \Image::make($image)->resize(720, 200);

            $name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->put('thumbnail' . $name, $thumbnail->stream());
            Storage::disk('public')->put('medium' . $name, $medium->stream());
            Storage::disk('public')->put('large' . $name, $large->stream());
        }
        else
        {
            $name=null;
        }
        $post = new Post;
        $post->title = title_case($request->title);
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->status = auth()->user()->is_admin ? $request->status : 1;
        $post->photo_path =$name;
        $post->save();
        $post->categories()->sync($request->category);

        return back()->with('success', 'Post was saved successfully.');
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

        $comments = $post->comments;
        if ($post->user_id == auth()->user()->id OR auth()->user()->is_admin) {
            return view('posts.public.show', ['post' => $post, 'comments' => $comments]);
        } else {

            return redirect()->route('publicpost.index');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::with('posts')->orderBy('title')->get();

        return view('posts.admin.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {

        $post = Post::findOrFail($id);

        if ($request->hasFile('imageUpload')) {
            Storage::delete('public/' . 'large' . $post->photo_path);
            Storage::delete('public/' . 'medium' . $post->photo_path);
            Storage::delete('public/' . 'thumbnail' . $post->photo_path);
            $image = $request->imageUpload;

            $thumbnail = \Image::make($image)->resize(50, 50);
            $medium = \Image::make($image)->resize(200, 200);
            $large = \Image::make($image)->resize(720, 200);

            $name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->put('thumbnail' . $name, $thumbnail->stream());
            Storage::disk('public')->put('medium' . $name, $medium->stream());
            Storage::disk('public')->put('large' . $name, $large->stream());
        } else {
            $name = $post->photo_path;
        }

        $post->title = $request->title;
        $post->photo_path = $name;
        $post->body = $request->body;
        $post->status = auth()->user()->is_admin ? $request->status : 1;
        $post->categories()->sync($request->category);
        $post->update();

        return back()->with('success', 'Your was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post->photo_path) {
            Storage::delete('public/' . 'large' . $post->photo_path);
            Storage::delete('public/' . 'medium' . $post->photo_path);
            Storage::delete('public/' . 'thumbnail' . $post->photo_path);
        }

        return back()->with('success', 'One post was deleted');
    }
}
