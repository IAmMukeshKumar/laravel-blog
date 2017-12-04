@extends('layouts.app')
@section('content')
    <div class="container">
        {{session('message')}}
    <div class="panel panel-default">

        <div class="panel-heading">{{$category->title}}</div>
        <div class="panel-body">
            <form action="{{route('tag.store',$category->id)}}" method="POST">
                {{csrf_field()}}

                <div class="input-group control-group after-add-more">
                    {{--<input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">--}}
                    <div class="input-group-btn">
                        <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>

                <div class="input-group control-group after-add-more">
                   @foreach($category->tags as $tag)
                        <div class="control-group input-group" style="margin-top:10px">

                            <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here" value="{{$tag->name}}" required>
                            <div class="input-group-btn">
                                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                        </div>
                       @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="copy hide">
                <div class="control-group input-group" style="margin-top:10px">

                    <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here" required>
                    <div class="input-group-btn">
                        <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection