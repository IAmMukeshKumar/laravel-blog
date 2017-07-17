@extends('layouts.app')

{{--Show posts listing--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Post Deletion message--}}
                @include('messages.successMessage')

                <div class="panel panel-default">
                    <h3 class="panel-heading">{{"Posts"}}</h3>
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('post.index')}}" method="get">
                                <div class="form-group">

                                    {{--Pagination Option--}}
                                    <select class="form-control" name="paginate" value="{{request('paginate')}}">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                        <option value="40">40</option>
                                        <option value="55">55</option>
                                    </select>
                                </div>

                                {{--Input search by title--}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Title"
                                           value="{{request('title')}}">
                                </div>

                                {{--Input search by body--}}
                                <div class="form-group">
                                    <input type="text" class="form-control" name="body" placeholder="body"
                                           value="{{request('body')}}">
                                </div>

                                {{--Input search by status--}}
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

                        {{--Post(s) table--}}
                        <table class="table table-hover">
                            <thead>
                            <div class="text-center">
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Comments</th>
                                    <th>Actions</th>
                                </tr>
                            </div>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{str_limit($post->title,10)}}</td>
                                    <td> {{str_limit($post->body,30)}}</td>
                                    <td>{{$post->category->category}}</td>
                                    <td> {{$post->status?'Draft':'Public'}}</td>
                                    <td>{{$post->comments_count}}</td>
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
                                               href="{{route('publicpost.show',['id' => $post->id, 'slug' => str_slug($post->title)])}}">Read</a>
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
