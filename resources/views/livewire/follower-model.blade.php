<div class="max-h-96 flex flex-col ">
    <div class="flex w full items-center border-b-2 border-b-neutral-100 p-2">
        <h1 class="text-lg font-bold text-center pb-2 grow">
            {{ __('Followers') }}
        </h1>
        <button wire:click="$dispatch('closeModal')"></button>
    </div>
    <ul class="overflow-y-auto">
        @forelse ($this->followerList as $follower)
            <li class="flex flex-row w-full p-3 items-center text-sm" wire:key="user-{{ $follower->id }}">
                <div>
               <img src="{{Str::startsWith($follower->image, 'http') ? $follower->image : asset('storage/' . $follower->image) }}" class="w-10 h-10 ltr:mr-2 rtl:ml-2 rounded-full border border-neutral-300" alt="">
                </div>
                <div class="flex flex-col grow rtl:text-right">
                    <div class="font-bold">
                        <a href="{{route('user_profile',$follower->username)}}"> {{$follower->username}}</a>
                    </div>
                    <div class="text-sm text-neutral-500">
                        {{$follower->name}}
                    </div>
                </div>
                @auth
                @if (auth()->id() == $this->user->id)
                   <div>
                   <a wire:click="removeFollower({{$follower->id}})" class="action-btn btn-primary bg-red-500">{{__('remove')}}</a> 
                    </div> 
                @endif
                   
                @endauth
            </li>
        @empty
        <div class="w-full p-3 text-center">
            {{ __('No followers yet') }}
        </div>
        @endforelse


    </ul>
</div>
