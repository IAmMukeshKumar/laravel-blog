@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h3 class="panel-heading">{{"Posts"}}</h3>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>  {{$post->content}}</td>
                                    <td>{{$post->category}}</td>
                                    <td> {{$post->status?'Draft':'Public'}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{route('post.edit',$post->id)}}"><i
                                                    class="glyphicon glyphicon-pencil"></i></a>

                                        <form action="{{route('post.destroy',$post->id)}}" method="post" onsubmit="return confirm('Are you sure ?')" style="display:inline-block;">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="glyphicon glyphicon-trash" ></i></button>
                                            <a class="btn btn-primary btn-xs" href="{{route('post.show',$post->id)}}">Read</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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