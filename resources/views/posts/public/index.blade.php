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
                            <h1> <a href="{{route('publicpost.show',['id' => $post->id, 'slug' => str_slug($post->title)])}}">{{title_case($post->title)}}</a> <div style="font-size:15px;display:inline-block;"> @if($post->created_at) Created at: {{$post->created_at->format('Y-m-d')}} @endif @if($post->updated_at)  Last update: {{$post->updated_at->format('Y-m-d')}} @endif</div></h1>
                            <h4> {{$post->category->category}}</h4>
                         {{str_limit($post->body,100)}}
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