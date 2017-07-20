<div class="panel panel-default">

    <div class="panel-heading">
        New comment
    </div>

    <div class="panel-body">
        <form class="form-horizontal" action="{{route('comment.store',['post'=>$post->id])}}" method="post">
            {{csrf_field()}}
            <div class="form-group @if($errors->has('comment')) has-error @endif">
                <label for="Comment" class="col-sm-2 control-label">Comment</label>
                <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Your comment"
                                      name="comment">{{old('comment')}}</textarea>
                    @if($errors->has('comment'))
                        <p class="help-block">{{$errors->first('comment')}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group @if($errors->has('name')) has-error @endif">
                <label for="inputName" class="col-sm-2 control-label"> Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Your name"
                           name="name" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class="help-block">{{$errors->first('name')}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group @if($errors->has('email')) has-error @endif">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Your Email"
                           name="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <p class="help-block">{{$errors->first('email')}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group text-right col-sm-12">
                <button type="reset" class="btn btn-outline-primary">RESET</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</div>















