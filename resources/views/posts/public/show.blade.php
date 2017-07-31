@extends('layouts.app')

{{--Show desired post--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

                @include('messages.successMessage')

                <div class="panel panel-default">
                    <div class="panel-body">

                        @if(!$post->photo_path)
                            <img src="{{asset('storage/default.png')}}" height="200" width="720">
                        @else
                            <img src="{{asset($post->photo_large)}}">
                        @endif
                        <h1>{{($post->title)}}</h1>
                        Author: {{$post->user->name}}
                        <article>
                            <p>
                                <br><i class="glyphicon glyphicon-calendar"></i>
                                <time title="{{$post->created_at->toDateTimeString()}}">{{$post->created_at->diffForHumans()}}</time>
                                in <i class="glyphicon glyphicon-folder-open"> </i>&ensp;
                                @foreach($post->categories as $category)
                                    {{$category->title}}
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </p>
                            <hr>
                            <p> {!! $post->body !!}</p>
                        </article>
                    </div>
                </div>

                //Create comment
                @include('comments.create')

                //Show aproved comment
                @include('comments.show')
            </div>
            @include('widgets.publicSidebarTopCategory')
        </div>
    </div>

@endsection
