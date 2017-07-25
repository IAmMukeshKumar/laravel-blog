@extends('layouts.app')

{{--Edit Post--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                {{--Edition message--}}
                @include('messages.successMessage')

                <div class="panel panel-default">
                    <div class="panel-heading">Update Post</div>
                    <div class="panel-body">
                        <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data"
                              id="update-task-form">
                            {{method_field('PATCH')}}
                            {{csrf_field()}}

                            @if(!$post->photo_path)
                                <img src="{{asset('storage/default.png')}}" height="128" width="128">
                            @else
                                <img src="{{asset('storage/'.$post->photo_path)}}" height="128" width="128">
                            @endif

                            <div class="form-group @if($errors->has('imageUpload')) has-error @endif">
                                <label> Image </label>
                                <input type="file" name="imageUpload" id="imageInput">
                                @if($errors->has('imageUpload'))
                                    <p class="help-block">{{$errors->first('imageUpload')}}</p>
                                @endif
                            </div>

                            <div class="form-group @if($errors->has('title')) has-error @endif">
                                <label> Title</label>
                                <input type="text" class="form-control" placeholder="Title" name="title"
                                       value="{{old('title',$post->title)}}">
                                @if($errors->has('title'))
                                    <p class="help-block">{{$errors->first('title')}}</p>
                                @endif
                            </div>

                            <div class="form-group @if($errors->has('body')) has-error @endif">
                                <label>Body</label>
                                <textarea class="form-control post-editor" rows="10" placeholder="Write something"
                                          name="body"> {{old('body',$post->body)}}</textarea>
                                @if($errors->has('body'))
                                    <p class="help-block">{{$errors->first('body')}}</p>
                                @endif
                            </div>

                            <div class="form-group @if($errors->has('category')) has-error @endif">
                                Category :
                                <select name="category[]" multiple class="form-control category-select">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if(in_array($category->id, old('category',$post->categories->pluck('id')->toArray())))
                                                selected
                                                @endif
                                        >{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <p class="help-block">{{$errors->first('category')}}</p>
                                @endif
                            </div>

                            @if(auth()->user()->is_admin)
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="status" class="col-md-4 control-label">status</label>
                                    Draft:
                                    <input type="radio" name="status" id="optionsRadios1" value=1
                                           @if(old('status',$post->status)==1) checked @endif>
                                    Public:
                                    <input type="radio" name="status" id="optionsRadios0" value=0
                                           @if(old('status',$post->status)==0) checked @endif>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            @endif
                            <button type="reset" class="btn btn-outline-primary">Reset</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
