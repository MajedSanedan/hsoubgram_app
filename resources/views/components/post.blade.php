<div>
    <div class="post-container">

        <div class="post-header">
            <img src="{{Str::startsWith($post->owner->image,'http')? $post->owner->image : asset('storage/'.$post->owner->image)}}" alt="User" class="user-avatar">
            <a href="#" class="username">{{ $post->owner->username }}</a>
            <a href="#" class="post-more"><i class="fas fa-ellipsis-h"></i></a>
        </div>

        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->description }}" class="post-image">

        <div class="post-actions">
            <button class="action-btn liked"><i class="fas fa-heart"></i></button>
            <button class="action-btn"><i class="far fa-comment"></i></button>
            <button class="action-btn"><i class="far fa-paper-plane"></i></button>
            <button class="action-btn save"><i class="far fa-bookmark"></i></button>
        </div>

        <div class="post-likes">8,932 likes</div>

        <div class="post-caption">
            <a href="#" class="username">{{ $post->owner->username }}</a>
            {{ $post->description }}
        </div>



        @if ($post->comments()->count() > 0)
            <div>

            </div>
            <a href="/post/{{ $post->slug }}" class="post-comments ">
                {{ __('view all ' . $post->comments()->count() . ' comments') }}
            </a>
        @endif


        <div class="post-time">
            {{ $post->created_at->diffForHumans(null, true, true) }}
        </div>

        <form action="post/{{ $post->slug }}/comment" class="add-comment" method="POST">
            @csrf
            <input type="text" class="comment-input" placeholder="{{__('Add a comment...')}}" name="body" id="comment_body">
            <button type="submit" class="post-btn">Post</button>

        </form>
        {{-- <div class="">
            <input type="text" class="comment-input" placeholder="Add a comment...">
            <button class="post-btn">Post</button>
        </div> --}}
    </div>
