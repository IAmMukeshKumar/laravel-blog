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
                              id="update-title-form">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}

                            {{--Category edition column--}}
                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                <label> Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title"
                                       value="{{old('title',$category->title )}}">
                                @if($errors->has('title'))
                                    <p class="help-block">{{$errors->first('title')}}</p>
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
