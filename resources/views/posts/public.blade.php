@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{"Posts"}}</h1>
                        <hr>
                          @foreach($posts as $post)

                            <h1> <a href="{{route('post.show',$post->id)}}">{{$post->title}}</a> <div style="font-size:15px;display:inline-block;"> Created at: {{$post->created_at}} Last update: {{$post->updated_at}}</div></h1>
                           <h4> {{$post->category}}</h4>
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