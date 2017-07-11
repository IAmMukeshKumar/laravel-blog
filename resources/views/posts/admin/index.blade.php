@extends('layouts.app')
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
                    <h3 class="panel-heading">{{"Posts"}}</h3>
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('post.index')}}" method="get">
                                <div class="form-group">
                                    <select class="form-control" name="paginate" value="{{request('paginate')}}">
                                        <option value="5">5</option>
                                        <option value="10">2</option>
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                        <option value="40">40</option>
                                        <option value="55">55</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title"
                                           value="{{request('title')}}">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="body" placeholder="body"
                                           value="{{request('body')}}">
                                </div>
                                <div class="form-group">
                                    <label class="checkbox">
                                        <input type="checkbox" name="status" value="1"
                                               @if(request('status')) checked @endif> Only show draft
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                            </form>
                        </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <div class="text-center">
                                <th>Title</th>
                                <th>Body</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                                </div>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td> {{str_limit($post->body,30)}}</td>
                                    <td>{{$post->category->category}}</td>
                                    <td> {{$post->status?'Draft':'Public'}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{route('post.edit',$post->id)}}"><i
                                                    class="glyphicon glyphicon-pencil"></i></a>
                                        <form action="{{route('post.destroy',$post->id)}}" method="post"
                                              onsubmit="return confirm('Are you sure ?')" style="display:inline-block;">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="glyphicon glyphicon-trash"></i></button>
                                            <a class="btn btn-primary btn-xs"
                                               href="{{route('post.show',$post->id)}}">Read</a>
                                        </form>
                                    </td>
                                </tr>
                           @empty
                                <div class="text-center">
                               {{"No data found"}}
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $posts->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
