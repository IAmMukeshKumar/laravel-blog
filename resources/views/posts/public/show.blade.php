@extends('layouts.app')

{{--Show desired post--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

                @include('messages.successMessage')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{($post->title)}}</h1>
                        <article>
                            <p>
                                <br><i class="glyphicon glyphicon-calendar"></i>
                                <time title="{{$post->created_at->toDateTimeString()}}">{{$post->created_at->diffForHumans()}}</time>
                                in <i class="glyphicon glyphicon-folder-open"> </i>&ensp;
                                @foreach($post->categories as $category)
                                    {{$category->category}}
                                @endforeach
                            </p>
                            <hr>
                            <p> {!! $post->body !!}</p>
                        </article>
                    </div>
                </div>
                @include('comments.create')
                @include('comments.show')
            </div>
            @include('widgets.publicSidebarTopCategory')
        </div>
    </div>

@endsection
