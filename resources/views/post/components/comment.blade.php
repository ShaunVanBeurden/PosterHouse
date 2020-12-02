<script src="/js/comments.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="comments-container">
            <ul id="comments-list" class="comments-list">
                @foreach($comments as $comment)
                    <li>
                        <div class="comment-main-level">
                            <div class="comment-box">
                                <div class="comment-head">
                                    @if (($post->user->id == $comment->user->id))
                                        <h6 class="comment-name by-author">{{$comment->user->name}}</h6>
                                    @else
                                        <h6 class="comment-name">{{$comment->user->name}}</h6>
                                    @endif
                                    <span>{{ $comment->created_at->diffForHumans() }}</span>
                                    <i class="fa fa-reply" onclick="showReply({{$comment->id}})"></i>
                                </div>

                                <div class="comment-content">
                                    {!!strip($comment->body)!!}
                                    @if(Auth::user())
                                        @if(Auth::user()->id == $comment->user_id || Auth::user()->isAdmin())
                                            <button type="button" class="btn btn-comment-edit" , id="{{$comment->id}}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </button>
                                        @endif
                                    @endif
                                </div>

                            </div>
                        </div>
                        @if(Auth::check() && currentUser()->isAdmin())
                            <form method="GET" action="{{ route('comments.show', $comment) }}">
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                                <button class="button button-show">Geschiedenis Bekijken</button>
                            </form>
                            <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="button button-delete">Verwijderen</button>
                            </form>
                        @endif
                        <div id="{{$comment->id}}" style="display:none">
                            <div class="comments-content">
                                <ul class="comments-list reply-list" id="{{$comment->id}}">
                                    <li>
                                        <form method="POST" action="{{ route('comments.store', $post) }}">
                                            {{csrf_field()}}
                                            <textarea name="body" class="form-control"
                                                      placeholder="Commentaar..."></textarea>
                                            <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            <button type="submit" class="btn btn-primary">Opslaan</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @foreach($comment->childs as $reply)
                        <li>
                            <div class="comment-box">
                                <div class="comment-head">
                                    @if (($post->user->id == $reply->user->id))
                                        <h6 class="comment-name by-author">{{$reply->user->name}}</h6>
                                    @else
                                        <h6 class="comment-name">{{$reply->user->name}}</h6>
                                    @endif
                                    <span>{{ $reply->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-content">
                                        {!! strip($reply->body)!!}
                                        @if(Auth::user())
                                            @if(Auth::user()->id == $comment->user_id || Auth::user()->isAdmin())
                                                <button type="button" class="btn btn-comment-edit" ,
                                                        id="{{$comment->id}}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"
                                                      style="width:10px"></span>
                                                </button>
                                            @endif
                                        @endif
                                        <div/>
                                    </div>
                                </div>
                                @if(Auth::check() && currentUser()->isAdmin())
                                    <form method="POST" action="{{ route('comments.destroy', $reply) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="button">Verwijderen</button>
                                    </form>
                            @endif
                        </li>
            </ul>
            @endforeach
            @endforeach
            </ul>
        </div>
    </div>
</div>
