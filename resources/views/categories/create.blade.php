@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="glyphicon glyphicon-ok"></i> {{session('success')}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">Add new category</div>
                    <div class="panel-body">
                        <form action="{{route('category.store')}}" method="post" id="add-category-form">
                            {{csrf_field()}}
                            <div class="form-group @if($errors->has('category')) has-error @endif">
                                <label> Category</label>
                                <input type="text" class="form-control" placeholder="Category" name="category"
                                       value="{{old('category')}}">
                                @if($errors->has('category'))
                                    <p class="help-block">{{$errors->first('category')}}</p>
                                @endif
                            </div>
                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Optional"
                                          name="description"> {{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
