@extends('layouts.app')

{{--Show desired post--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{($post->title)}}</h1>
                        <h4 style="font-style:italic;display:inline-block;">{{$post->category->category}}</h4>
                        <p>
                            @if($post->created_at)
                                Created at :{{$post->created_at->format('Y-m-d')}}
                            @endif
                        </p>
                        <hr>
                        <p style="word-break: keep-all;overflow: scroll;white-space: pre"> {{ $post->body }}</p>
                        {{--@lang($post->body)--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('comments.create')
    @include('comments.show')
@endsection
