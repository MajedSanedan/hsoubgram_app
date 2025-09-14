<div>

    <a wire:click="like" class="action-btn">
        @if ($post->liked(auth()->user()))

                <i class="fas fa-heart text-2xl text-red-500 "></i>
          
        @else
            <i class="far fa-heart text-2xl hover:text-gray-400 cursor-pointer mr-3"></i>
        @endif
    </a>
</div>
