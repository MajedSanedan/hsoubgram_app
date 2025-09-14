<div class="max-h-96 flex flex-col ">
    <div class="flex w full items-center border-b-2 border-b-neutral-100 p-2">
        <h1 class="text-lg font-bold text-center pb-2 grow">
            {{ __('Following') }}
        </h1>
        <button wire:click="$dispatch('closeModal')"></button>
    </div>
    <ul class="overflow-y-auto">
        @forelse ($this->followingList as $following)
            <li class="flex flex-row w-full p-3 items-center text-sm" wire:key="user-{{ $following->id }}">
                <div>
               <img src="{{Str::startsWith($following->image, 'http') ? $following->image : asset('storage/' . $following->image) }}" class="w-10 h-10 ltr:mr-2 rtl:ml-2 rounded-full border border-neutral-300" alt="">
                </div>
                <div class="flex flex-col grow rtl:text-right">
                    <div class="font-bold">
                        <a href="{{route('user_profile',$following->username)}}"> {{$following->username}}</a>
                    </div>
                    <div class="text-sm text-neutral-500">
                        {{$following->name}}
                    </div>
                </div>
                @auth
                @if (auth()->id() == $this->user->id)
                   <div>
                   <a wire:click="unfollow({{$following->id}})" class="action-btn btn-primary bg-red-500">{{__('unfollow')}}</a> 
                    </div> 
                @endif
                   
                @endauth
            </li>
        @empty
        <div class="w-full p-3 text-center">
            {{ __('No following yet') }}
        </div>
        @endforelse


    </ul>
</div>
