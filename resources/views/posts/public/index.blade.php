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
                                    <select class="form-control" name="paginate" value="{{request('paginate')}}">
                                        @if(request('paginate')>1)
                                            <option value="request('paginate')">{{request('paginate')}}</option>
                                        @endif
                                        @for($i=5;$i<=55;$i<15 ?$i+=5 : $i+=10)
                                            @if(request('paginate') != $i)
                                                <option value={{$i}}>{{$i}}</option>
                                            @endif
                                        @endfor
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
                                <h2>
                                    <a href="{{route('publicpost.show',['id' => $post->id, 'slug' => str_slug($post->title)])}}">{{title_case($post->title)}}</a>
                                </h2>
                                <p>
                                    <br><i class="glyphicon glyphicon-calendar"></i>
                                    <time title="{{$post->created_at->toDateTimeString()}}">{{$post->created_at->diffForHumans()}}</time>
                                    in
                                    <i class="glyphicon glyphicon-folder-open"> </i>&ensp;
                                    @foreach($post->categories as $category)
                                        {{$category->category}},
                                    @endforeach
                                </p>
                                <p>
                                    {{str_limit($post->body,200)}}
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