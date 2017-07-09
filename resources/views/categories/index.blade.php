@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="well">
                            <form class="form-inline" action="{{route('category.index')}}" method="get">
                                <div class="form-group">
                                    <select class="form-control" name="paginate" value="{{request('paginate')}}">
                                        <option value="5">5</option>
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                                <div class="form-group">
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
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->category}}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs"
                                           href="{{route('category.edit',$category->id)}}"><i
                                                    class="glyphicon glyphicon-pencil"></i></a>
                                        <form action="{{route('category.destroy',$category->id)}}" method="post"
                                              onsubmit="return confirm('Are you sure ?')" style="display:inline-block;">
                                            {{method_field('DELETE')}}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="glyphicon glyphicon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <a class="btn btn-primary btn-xs" href="{{route('category.create')}}"><i
                                        class="glyphicon glyphicon-plus"></i> New category</a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection