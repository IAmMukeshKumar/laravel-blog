@extends('layouts.app')

{{--Public home page--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('publicpost.index')}}" method="get">

                                {{--Input pagination--}}
                                <div class="form-group">
                                    <select class="form-control" name="paginate">
                                        <option value="5" @if(request('paginate') === '5') selected @endif>5</option>
                                        <option value="10" @if(request('paginate') === '10') selected @endif>10</option>
                                        <option value="15" @if(request('paginate') === '15') selected @endif>15</option>
                                        <option value="20" @if(request('paginate') === '20') selected @endif>20</option>
                                        <option value="30" @if(request('paginate') === '30') selected @endif>30</option>
                                        <option value="45" @if(request('paginate') === '45') selected @endif>45</option>
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
                        <h1>Posts</h1>
                        <hr>

                        {{--Show post result--}}
                        @forelse($posts as $post)
                            <article>

                                @if(!$post->photo_path)
                                    <img src="{{asset('storage/default.png')}}" height="200" width="200">
                                @else
                                    <img src="{{asset($post->photo_medium)}}">

                                @endif

                                <h2>
                                    <a href="{{route('publicpost.show',['id' => $post->id, 'slug' => str_slug($post->title)])}}">{{title_case($post->title)}}</a>
                                </h2>
                                Author : {{$post->user->name}}
                                <p>
                                    <br><i class="glyphicon glyphicon-calendar"></i>
                                    <time title="{{$post->created_at->toDateTimeString()}}">{{$post->created_at->diffForHumans()}}</time>
                                    in
                                    <i class="glyphicon glyphicon-folder-open"> </i>&ensp;

                                    @foreach($post->categories as $category)
                                        {{$category->title}}
                                        @if(!$loop->last)
                                            ,
                                        @endif

                                    @endforeach
                                </p>
                                <p>
                                    {!! str_limit($post->body,200) !!}
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
            @include('widgets.publicSidebarTopCategory')
        </div>
    </div>
@endsection