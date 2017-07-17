@extends('layouts.app')

{{--Edit category--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                {{--Show edition status--}}
                @include('messages.successMessage')

                <div class="panel panel-default">
                    <div class="panel-heading">Update category</div>
                    <div class="panel-body">
                        <form action="{{route('category.update',$category->id)}}" method="post"
                              id="update-category-form">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}

                            {{--Category edition column--}}
                            <div class="form-group @if($errors->has('category')) has-error @endif">
                                <label> Category</label>
                                <input type="text" class="form-control" placeholder="Category" name="category"
                                       value="{{old('category',$category->category )}}">
                                @if($errors->has('category'))
                                    <p class="help-block">{{$errors->first('category')}}</p>
                                @endif
                            </div>

                            {{--Update description --}}
                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Optional"
                                          name="description"> {{old('description',$category->description)}}</textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <input class="btn btn" type="reset" value="Reset">
                            <button type="reset" class="btn btn-outline-primary">RESET</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
