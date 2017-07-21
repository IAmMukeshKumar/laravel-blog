@extends('layouts.app')

{{--Create new category--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                {{--Show new category creation message--}}
                @include('messages.successMessage')

                <div class="panel panel-default">
                    <div class="panel-heading">Add new category</div>
                    <div class="panel-body">
                        <form action="{{route('category.store')}}" method="post" id="add-title-form">
                            {{csrf_field()}}

                            {{--Input category--}}
                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                <label> Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title"
                                       value="{{old('title')}}">
                                @if($errors->has('title'))
                                    <p class="help-block">{{$errors->first('title')}}</p>
                                @endif
                            </div>

                            {{--Input description--}}
                            <div class="form-group @if($errors->has('description')) has-error @endif">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Optional" name="description">{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">{{$errors->first('description')}}</p>
                                @endif
                            </div>
                            <button type="reset" class="btn btn-outline-primary">Reset</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
