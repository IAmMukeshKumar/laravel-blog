<?php

namespace App\Http\Controllers;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;

class TagController extends Controller
{
    public function add($id)
    {
       $category=Category::findOrFail($id);

        return view('tags.add',['category'=>$category]);
    }

    public function store($id,TagRequest $request)
    {
        Category::findOrFail($id);

        $num=count($request->addmore);

        for($i=0;$i<$num;$i++)
        {
            $tag=new Tag;
            $tag->category_id=$id;
            $tag->name=$request->addmore[$i];
            $tag->save();
        }
        return back()->with('message','Tag(s) added successfully');
    }
}
