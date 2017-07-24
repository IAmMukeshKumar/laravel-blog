@extends('layouts.app')

{{--Public home page--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h1>Posts</h1>
                        <hr>

                        {{--Show post result--}}
                        @forelse($category->posts as $post)
                            <article>
                                @if(!$post->photo_path)
                                    <img src="{{asset('storage/default.png')}}" height="200" width="200">
                                @else
                                    <img src="{{asset('storage/'.$post->photo_path)}}" height="200" width="200">
                                @endif
                                <h2>
                                    <a href="{{route('publicpost.show',['id' => $post->id, 'slug' => str_slug($post->title)])}}">{{title_case($post->title)}}</a>
                                </h2>
                                Author: {{$post->user->name}}
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

                    </div>
                </div>
            </div>
            @include('widgets.publicSidebarTopCategory')
        </div>
    </div>
@endsection