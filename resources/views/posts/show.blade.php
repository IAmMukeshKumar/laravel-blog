@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                            <h1>{{$post->title}}</h1>
                            <h4 style="font-style:italic;display:inline-block;">Category</h4>
                        <hr>
                        <p> {{$post->content}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection