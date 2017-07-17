@extends('layouts.app')

{{--Create new post--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                {{--Show creation message--}}
                @include('messages.successMessage')

                <div class="panel panel-default">
                    <div class="panel-heading">New Post</div>
                    <div class="panel-body">
                        <form action="{{route('post.store')}}" method="post" id="update-task-form">
                            {{csrf_field()}}

                            {{--Input title--}}
                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                <label> Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title"
                                       value="{{old('title')}}">
                                @if($errors->has('title'))
                                    <p class="help-block">{{$errors->first('title')}}</p>
                                @endif
                            </div>

                            {{--Input body--}}
                            <div class="form-group @if($errors->has('body')) has-error @endif">
                                <label>Body</label>
                                <textarea class="form-control" rows="10" placeholder="Write something"
                                          name="body"> {{old('body')}}</textarea>
                                @if($errors->has('body'))
                                    <p class="help-block">{{$errors->first('body')}}</p>
                                @endif
                            </div>

                            {{--Select category--}}
                            <div class="form-group @if($errors->has('category')) has-error @endif">
                                {{"Category : "}}
                                <select name="category">
                                    @foreach($categories as $category)
                                        @if(old('category')==$category->id)
                                          <option value="{{$category->id}}" selected>{{$category->category}}</option>
                                        @else
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <p class="help-block">{{$errors->first('category')}}</p>
                                @endif
                            </div>

                            {{--Select status--}}
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">status</label>
                                Draft:
                                <input type="radio" name="status" id="optionsRadios1" value=1
                                       @if(old('status')==1) checked @endif>
                                Public:
                                <input type="radio" name="status" id="optionsRadios0" value=0
                                       @if(old('status')==0) checked @endif>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="reset" class="btn btn-outline-primary">RESET</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
