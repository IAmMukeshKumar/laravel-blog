@extends('layouts.app')

{{--Show category list--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Show deletion message --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="glyphicon glyphicon-ok"></i> {{session('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('category.index')}}" method="get">
                                <div class="form-group">

                                    {{--Pagination --}}
                                    <select class="form-control" name="paginate" value="{{request('paginate')}}">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="25">25</option>
                                        <option value="40">40</option>
                                        <option value="55">55</option>
                                    </select>

                                </div>
                                <div class="form-group">

                                    {{--Input category search--}}
                                    <input type="text" class="form-control" name="category" placeholder="Category"
                                           value="{{request('category')}}">

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
                                <th>Posts</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{$category->category}}</td>
                                    <td>{{$category->posts_count}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs"
                                           href="{{route('category.edit',$category->id)}}"><i
                                                    class="glyphicon glyphicon-pencil"></i></a>
                                        <form action="{{route('category.destroy',$category->id)}}" method="post"
                                              onsubmit="return confirm('Are you sure ?')" style="display:inline-block;">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            @if(!$category->posts_count)
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs">
                                                    <i class="glyphicon glyphicon-trash"></i></button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="text-center">
                                    {{"No data found"}}
                                </div>
                            @endforelse
                            <a class="btn btn-primary btn-xs" href="{{route('category.create')}}"><i
                                        class="glyphicon glyphicon-plus"></i> New category</a>
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{ $categories->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection