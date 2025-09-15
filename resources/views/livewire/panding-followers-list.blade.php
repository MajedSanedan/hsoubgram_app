<div wire:poll.2s class="max-h-64 overflow-y-auto w-full">
    <ul class="w-full devide-y devide-gray-200">
        @forelse (auth()->user()->panding_followers() as $panding)
            <li class="flex  items-center justify-between gap-2 p-3 w-full" wire:key="user-{{ $panding->id }}">

                <div class="flex items-center gap-3">



             
                        <img src="{{ Str::startsWith($panding->image, 'http') ? $panding->image : asset('storage/' . $panding->image) }}"
                            class="w-10 h-10 ltr:mr-2 rtl:ml-2 rounded-full border border-neutral-300" alt="">
               
                    <div class="flex flex-col grow rtl:text-right">
                        <span class="font-semibold text-sm truncate w-36">
                            <a href="{{ route('user_profile', $panding->username) }}"> {{ $panding->username }}</a>
                        </span>
                        <span class="text-xs text-gray-500 truncate w-36">
                            {{ $panding->name }}
                        </span>
                    </div>
                </div>
                <div class="flex gap-1">
                    <button wire:click="confirme({{ $panding->id }})"
                        class="action-btn btn-primary">{{ __('confirme') }}</button>
                    <button wire:click="delete({{ $panding->id }})"
                        class="action-btn btn-primary bg-red-500 ">{{ __('remove') }}</button>
                </div>

            </li>

        @empty

          <div class="w-full p-3 text-center">
            {{ __('No request followers yet') }}
        </div>
        @endforelse
    </ul>
</div>
