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
                            <img src="{{asset('storage/DefaultImage/default.png')}}" height="200" width="720">
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
                                | Tags:
                                @foreach($post->categories as $category)
                                    @foreach($category->tags as $tag)
                                        {{$tag->name}}
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                @endforeach
                            </p>
                            <hr>
                            <p> {!! $post->body !!}</p>
                            <hr>
                            @if($post->status==0)
                                Share on :
                            <a href="{{route('ShareOnFacebook',$post->id)}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            @endif
                        </article>
                    </div>
                </div>

                {{--Create comment--}}
                @include('comments.create')

                {{--Show aproved comment--}}
                @include('comments.show')
            </div>
            @include('widgets.publicSidebarTopCategory')
        </div>
    </div>

@endsection
