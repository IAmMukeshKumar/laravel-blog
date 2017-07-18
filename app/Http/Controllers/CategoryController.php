<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->has('paginate') ? $request->input('paginate') : 5;

        $categories = Category::where(function ($query) use ($request) {
            if ($request->has('category'))
                $query->where('category', 'like', '%' . $request->input('category') . '%');
        })->withCount('posts')->orderBy('category')->paginate((int)$paginate);

        return view('categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::findOrFail(auth()->user()->is_admin);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
            User::findOrFail(auth()->user()->is_admin);
            $category = new Category;
            $category->category = $request->category;
            $category->description = $request->description;
            $category->save();

            return back()->with('success', 'Category was added successfully');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::findOrFail(auth()->user()->is_admin);
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        User::findOrFail(auth()->user()->is_admin);
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->save();

        return back()->with('success', 'Category was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail(auth()->user()->is_admin);
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category was deleted');
    }
}
