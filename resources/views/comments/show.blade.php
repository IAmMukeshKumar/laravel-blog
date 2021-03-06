<div class="panel panel-default">

    <div class="panel-heading">
        Comments
    </div>

    <div class="panel-body">
        @forelse($comments as $comment)
            @if(auth()->user())
                @if(auth()->user()->id==$post->user_id OR auth()->user()->is_admin)
                    <time title="{{$comment->created_at->toDateTimeString()}}">{{$comment->created_at->diffForHumans()}}</time>
                    <h3>{{$comment->guest->name}}</h3>
                    <p>{{$comment->body}}</p>

                    {{--Delete comment--}}
                    <form action="{{route('comment.delete',$comment->id)}}" method="get"
                          onsubmit="return confirm('Are you sure ?')" style="display:inline-block;">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <div class="form-group text-right col-sm-12">
                            <button type="submit" class="btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </form>

                    {{--Approve comment--}}
                    <form action="{{route('comment.approve',$comment->id)}}" method="get"
                          onsubmit="return confirm('Are you sure ?')" style="display:inline-block;">
                        {{method_field('PATCH')}}
                        {{csrf_field()}}
                        <div class="form-group text-right col-sm-12">
                            <button type="submit" class="btn btn-primary btn-xs">
                                @if($comment->status) Disapprove @else Approve
                                @endif</button>
                        </div>
                    </form>

                    <hr>
                @endif
                @elseif($comment->status)
                    <time title="{{$comment->created_at->toDateTimeString()}}">{{$comment->created_at->diffForHumans()}}</time>
                    <h3>{{$comment->guest->name}} </h3>
                    <p>{{$comment->body}}</p>
                    <hr>
            @endif
        @empty
            {{"No comment available"}}
        @endforelse
    </div>

</div>

















