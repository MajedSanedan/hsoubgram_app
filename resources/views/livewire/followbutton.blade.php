<div>
    @if ($isFollowing)
        <a wire:click ="toggleFollow" class="action-btn {{$classes  }} {{$showbg? 'bg-red-500': 'text-red-500'}}">
            {{ __('unfollow') }}
        </a>
    @elseif($isPanding)
        <span class="action-btn {{$classes}} {{$showbg? 'bg-gray-400' : 'text-gray-600'}}">
            {{ __('panding..') }}
        </span>
    @else
        <a wire:click ="toggleFollow" class="action-btn {{$classes}}">{{ __('follow') }}</a>
    @endif
</div>
