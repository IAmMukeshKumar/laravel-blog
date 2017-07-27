@extends('layouts.app')

{{--Show posts listing--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">

                {{--Post Deletion message--}}
                @include('messages.successMessage')

                <div class="panel panel-default">
                    <h3 class="panel-heading">{{"Posts"}}</h3>
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('post.index')}}" method="get">
                                <div class="form-group">

                                    {{--Pagination Option--}}
                                    <select class="form-control" name="paginate">
                                        <option value="5" @if(request('paginate')=== '5') selected @endif>5</option>
                                        <option value="10" @if(request('paginate')=== '10') selected @endif>10</option>
                                        <option value="15" @if(request('paginate')=== '15') selected @endif>15</option>
                                        <option value="20" @if(request('paginate')=== '20') selected @endif>20</option>
                                        <option value="30" @if(request('paginate')=== '30') selected @endif>30</option>
                                        <option value="45" @if(request('paginate')=== '45') selected @endif>45</option>

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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th> @if(auth()->user()->is_admin) Change status  @else Status @endif</th>
                                    <th>Comments</th>
                                    <th>Actions</th>
                                </tr>
                            </div>
                            </thead>
                            <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>
                                        @if(!$post->photo_path)
                                            <img src="{{asset('storage/default.png')}}" height="30" width="30">
                                        @else
                                            <img src="{{$post->photo_url}}" height="30" width="30">
                                        @endif
                                    </td>
                                    <td>{{str_limit($post->title,10)}}</td>
                                    <td>
                                        @foreach($post->categories as $category)
                                            {{$category->title}}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$post->user->name}}</td>
                                    <td>
                                        @if(auth()->user()->is_admin)
                                            <form action="{{route('post.approve',$post->id)}}" method="get"
                                                  onsubmit="return confirm('Are you sure ?')">
                                                {{method_field('PATCH')}}
                                                {{csrf_field()}}
                                                <div class="form-group text-right col-sm-12">
                                                    <button type="submit" class="btn btn-primary btn-xs">
                                                        @if($post->status) Approve @else Disapprove
                                                        @endif
                                                    </button>
                                                </div>
                                            </form>
                                        @else
                                            {{$post->status?'Draft':'Public'}}
                                        @endif
                                    </td>
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
                                               href="{{route('post.show',['id' => $post->id])}}">Read</a>
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
