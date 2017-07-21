@extends('layouts.app')

{{--Show category list--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Show deletion message --}}
                @include('messages.successMessage')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('category.index')}}" method="get">
                                <div class="form-group">

                                    {{--Pagination --}}
                                    <select class="form-control" name="paginate">
                                        <option value="5" @if(request('paginate') === '5') selected @endif>5</option>
                                        <option value="10" @if(request('paginate') === '10') selected @endif>10</option>
                                        <option value="15" @if(request('paginate') === '15') selected @endif>15</option>
                                        <option value="20" @if(request('paginate') === '20') selected @endif>20</option>
                                        <option value="30" @if(request('paginate') === '30') selected @endif>30</option>
                                        <option value="45" @if(request('paginate') === '45') selected @endif>45</option>
                                    </select>

                                </div>
                                <div class="form-group">

                                    {{--Input title search--}}
                                    <input type="text" class="form-control" name="title" placeholder="Title"
                                           value="{{request('title')}}">

                                </div>
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>
                                    Search
                                </button>
                            </form>
                        </div>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Posts</th>
                                @if(auth()->user()->is_admin)
                                    <th>Actions</th>@endif
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->posts_count}}</td>
                                    @if(auth()->user()->is_admin)
                                        <td>
                                            <a class="btn btn-primary btn-xs"
                                               href="{{route('category.edit',$category->id)}}"><i
                                                        class="glyphicon glyphicon-pencil"></i></a>
                                            <form action="{{route('category.destroy',$category->id)}}" method="post"
                                                  onsubmit="return confirm('Are you sure ?')"
                                                  style="display:inline-block;">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                @if(!$category->posts_count)
                                                    <button type="submit"
                                                            class="btn btn-danger btn-xs">
                                                        <i class="glyphicon glyphicon-trash"></i></button>
                                                @endif
                                            </form>
                                        </td>@endif
                                </tr>
                            @empty
                                <div class="text-center">
                                    {{"No data found"}}
                                </div>
                            @endforelse

                            @if(auth()->user()->is_admin)
                            <a class="btn btn-primary btn-xs" href="{{route('category.create')}}"><i
                                        class="glyphicon glyphicon-plus"></i> New category</a>
                                @endif
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{--{{ $categories->appends(request()->all())->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection