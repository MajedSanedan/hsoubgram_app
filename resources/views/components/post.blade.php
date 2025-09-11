<div>
    <div class="post-container">

        <div class="post-header">
            <img src="{{Str::startsWith($post->owner->image,'http')? $post->owner->image : asset('storage/'.$post->owner->image)}}" alt="User" class="user-avatar">
            <a href="#" class="username">{{ $post->owner->username }}</a>
            <a href="#" class="post-more"><i class="fas fa-ellipsis-h"></i></a>
        </div>

        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->description }}" class="post-image">

        <div class="post-actions">

            <a  href="{{route('post_like',$post->slug)}}">
                @if ($post->liked(auth()->user()))
                <div class="action-btn liked">
                  <i class="fas fa-heart text-2xl "></i>
                  </div>   
                @else
                   <i class="far fa-heart text-2xl hover:text-gray-400 cursor-pointer mr-3"></i> 
                @endif
                </a>
            <a class="action-btn" href="{{route('show_post',$post->slug)}}"><i class="far fa-comment text-2xl hover:text-gray-400 cursor-pointer mr-3"></i></a>
            <a class="action-btn"><i class="far fa-paper-plane text-2xl hover:text-gray-400 cursor-pointer mr-3"></i></a>
            <a class="action-btn save"><i class="far fa-bookmark text-2xl hover:text-gray-400 cursor-pointer mr-3"></i></a>
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
