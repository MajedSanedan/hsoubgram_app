<x-app-layout>

    <div class="h-screen md:flex md:flex-row">

        {{-- left side --}}
        <div class="flex items-center overflow-hissen bg-black md:w-7/12">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->description }}" class="object-cover w-full">
        </div>

        {{-- Right side --}}

        <div class="flex w-full flex-col bg-white md:w-5/12">
            {{-- top --}}
            <div class="border-b2">
                <dv class="flex items-center p-5 gap-0">
                    <img src="{{ $post->owner->image }}" alt="{{ $post->owner->username }}"
                        class="mr-5 h-10 w-10 rounded-full">
                    <div class="grow">
                        <a href="" class="font-bold">
                            {{ $post->owner->username }}
                        </a>
                    </div>
                </dv>
            </div>

            {{-- Middle --}}
            <div class="grow">
                <div class="flex items-start px-5 py-2 gap-3">
                    <img src="{{ $post->owner->image }}" class="ltr:mr-5 rtl:ml-5 h-10 w-10 rounded-full">

                    <div class="flex flex-col">
                        <div>
                            <a href="" class="font-bold">
                                {{ $post->owner->username }}
                            </a>
                            <span class="inline">{{ $post->description }}</span>
                        </div>
                        <div class="mt-1 text-sm text-fray-400">
                            {{ $post->created_at->diffForHumans(null, true, true) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>









    </div>


</x-app-layout>
