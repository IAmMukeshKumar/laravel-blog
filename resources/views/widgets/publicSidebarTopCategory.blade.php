<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Top 5 Categories</h4>
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="{{route('category.posts', ['id' => $category->id, 'slug' => str_slug($category->title)])}}">
                            {{$category->title}}
                            <span class="badge pull-right">{{$category->posts_count}}</span>
                        </a>
                        </li>
                @endforeach
            </ul>
            <div class="text-center">
                {{--{{ $posts->appends(all())->links()}}--}}
            </div>
        </div>
    </div>
</div>

