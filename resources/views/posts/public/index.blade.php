@extends('layouts.app')

{{--Public home page--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('publicpost.index')}}" method="get">

                                {{--Input pagination--}}
                                <div class="form-group">
                                    <select class="form-control" name="paginate" value="{{request('paginate')}}">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                        <option value="40">40</option>
                                        <option value="55">55</option>
                                    </select>
                                </div>

                                {{--Search by title--}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title"
                                           value="{{request('title')}}">
                                </div>

                                {{--Search by body content--}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="body" placeholder="body"
                                           value="{{request('body')}}">
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                            </form>
                        </div>
                        <h1>{{"Posts"}}</h1>
                        <hr>

                        {{--Show post result--}}
                        @forelse($posts as $post)
                            <article>
                                <h2>
                                    <a href="{{route('publicpost.show',['id' => $post->id, 'slug' => str_slug($post->title)])}}">{{title_case($post->title)}}</a>
                                </h2>
                                <p>
                                    <br><i class="glyphicon glyphicon-calendar"></i>
                                    <time title="{{$post->created_at->toDateTimeString()}}">{{$post->created_at->diffForHumans()}}</time>
                                    in
                                    <i class="glyphicon glyphicon-folder-open"> </i>&ensp;{{$post->category->category}}
                                </p>
                                <p>
                                    {{str_limit($post->body,200)}}
                                </p>
                            </article>
                            <hr>
                        @empty
                            {{"No data found"}}
                        @endforelse

                        <div class="text-center">
                            {{ $posts->appends(request()->all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection