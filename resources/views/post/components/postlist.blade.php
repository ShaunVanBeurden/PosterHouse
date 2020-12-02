@foreach ($posts as $post)
    <a href="{{route('posts.show', $post)}}">
        <div class="post-preview">
            <div class="author">
                <img class="post-avatar" src="{{asset('/images/person.jpg')}}">
                <div class="author-identity">
                    {{$post->user->name}}
                    <br>
                    <div class="post-information">
                        {{$post->created_at->diffForHumans()}} &nbsp
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i> &nbsp
                        {{count($post->comments)}} Comments
                    </div>
                </div>
            </div>
            <br>
            <div class="post-thumbnail">
                <img class="thumbnail" src="{{asset("/storage/posts/$post->id.jpeg")}}">
            </div>

            <div class="preview-title">
                {{$post->title}}
            </div>

            <div class="preview-body">
                {{ strip_tags(\Illuminate\Support\Str::words($post->body, 20)) }}
            </div>
        </div>
    </a>

    <br>


@endforeach