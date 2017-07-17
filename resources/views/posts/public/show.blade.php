@extends('layouts.app')

{{--Show desired post--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="glyphicon glyphicon-ok"></i> {{session('success')}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{($post->title)}}</h1>
                        <article>
                            <p>
                                <br><i class="glyphicon glyphicon-calendar"></i>
                                <time title="{{$post->created_at->toDateTimeString()}}">{{$post->created_at->diffForHumans()}}</time>
                                in <i class="glyphicon glyphicon-folder-open"> </i>&ensp;{{$post->category->category}}
                            </p>
                            <p>
                            <hr>
                            <p style="word-break: keep-all;overflow: scroll;white-space: pre"> {{ $post->body }}</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('comments.create')
    @include('comments.show')
@endsection
