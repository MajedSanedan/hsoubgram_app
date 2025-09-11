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
                    @if ($post->owner->id === auth()->id())
                        <a href="{{ route('edit_post', $post->slug) }}">
                            <i class='bx  bx-edit'></i>
                        </a>

                        <form action="{{ route('destroy_post', $post->slug) }}" id="delete-post-form-{{ $post->id }}"
                            method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600" type="button" onclick="confirmDelete({{ $post->id }})">
                                <i class='bx  bx-trash '  ></i> 
                                {{-- <li class="bx bx-message-square-x inline ml-2 text-red-600"></li> --}}
                            </button>
                        </form>
                    @endif
                </dv>
            </div>

            {{-- Middle --}}
            <div class="grow">
                <div class="flex items-start px-5 py-2 gap-3">
                    <img src="{{ Str::startsWith($post->owner->image,'https')? $post->owner->image : asset('storage/'.$post->owner->image) }}" class="ltr:mr-5 rtl:ml-5 h-10 w-10 rounded-full">

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

                {{-- comments --}}

                @foreach ($post->comments as $comment)
                    <div class="flex items-start px-5 py-2 gap-2">
                        <img src="{{ Str::startsWith($comment->owner->image ,'https')? $comment->owner->image : asset('storage/'.$comment->owner->image )}}" class="h-10 w-10 rounded-full ltr:mr-5 rtl:ml-5">

                        <div class="flex flex-col">
                            <div>
                                <a href="" class="font-bold mr-2 inline-block">
                                    {{ $comment->owner->username }}
                                </a>
                                <span class="inline">{{ $comment->body }}</span>
                            </div>
                            <div class="mt-1 text-sm text-gray-400">
                                {{ $comment->created_at->diffForHumans(null, true, true) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


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
            <a class="action-btn" onclick="document.getElementById('comment_body').focus()"><i class="far fa-comment text-2xl hover:text-gray-400 cursor-pointer mr-3"></i></a>
            <a class="action-btn"><i class="far fa-paper-plane text-2xl hover:text-gray-400 cursor-pointer mr-3"></i></a>
            <a class="action-btn save"><i class="far fa-bookmark text-2xl hover:text-gray-400 cursor-pointer mr-3"></i></a>
        </div>
            <div class="border-t p-5">
                <form action="/post/{{ $post->slug }}/comment" method="POST">
                    @csrf
                    @if ($errors->has('body'))
                        <div class="text-red-500 text-sm mb-2">
                            {{ $errors->first('body') }}
                        </div>
                    @endif

                    <div class="flex flex-row">
                        <textarea name="body" id="comment_body" placeholder="{{ __('Add a comment') }}"
                            class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0"
                            required></textarea>
                        <button type="submit" class="ltr:ml-5 rtl:ml-5 border-none bg-white text-blue-500">
                            {{ __('comment') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>







    </div>


</x-app-layout>
    <script>
        function confirmDelete(postId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'this action can not undone!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3086d6',
                confirmButtonText: 'Yes Delete it',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-post-form-' + postId).submit();
                }
            });
        }
    </script>