@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('post.index')}}" method="get">
                                <div class="form-group">
                                    <select class="form-control" name="paginate" value="{{request('paginate')}}">
                                        <option value="5">5</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title"
                                           value="{{request('title')}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="content" placeholder="Content"
                                           value="{{request('content')}}">
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<input type="text" class="form-control" name="category" placeholder="Category"--}}
                                           {{--value="{{request('category')}}">--}}
                                {{--</div>--}}
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                            </form>
                        </div>
                        <h1>{{"Posts"}}</h1>
                        <hr>
                          @foreach($posts as $post)
                            <h1> <a href="{{route('post.show',$post->id)}}">{{$post->title}}</a> <div style="font-size:15px;display:inline-block;"> Created at: {{$post->created_at}} Last update: {{$post->updated_at}}</div></h1>
                           <h4> {{$post->category->category}}</h4>
                            {{$post->content}}
                            <hr>

                          @endforeach
                        <div class="text-center">
                            {{ $posts->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection