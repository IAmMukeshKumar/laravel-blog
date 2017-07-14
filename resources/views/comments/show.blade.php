<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Comments
                </div>
                <div class="panel-body">
                    @forelse($comments as $comment)
                        <h3>{{$comment->guest->name}}</h3>
                       <p>{{$comment->created_at->format('Y-m-d')}}</p>
                        {{$comment->body}}
                        <hr>
                    @empty
                        {{"No comment available"}}
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
</div>














