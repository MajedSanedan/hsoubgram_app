<x-app-layout>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Feed Column -->
            {{-- Left side --}}
            <div class="col-lg-8">
                <!-- Stories -->

                <div class="stories-container">

                    @foreach ($users as $user)
                        @if (auth()->id() == $user->id)
                            <div class="story">
                                <div class="story-avatar">
                                    <img src="{{ Str::startsWith($user->image, 'http') ? $user->image : asset('storage/' . $user->image) }}"
                                        alt="Your Story">
                                </div>
                                <div class="story-username">{{ $user->username }}</div>
                            </div>
                        @endif
                    @endforeach
                    @foreach ($users as $user)
                        @if (auth()->id() != $user->id)
                            <div class="story">
                                <div class="story-avatar">
                                    <img src="{{ Str::startsWith($user->image, 'http') ? $user->image : asset('storage/' . $user->image) }}"
                                        alt="Your Story">
                                </div>
                                <div class="story-username">{{ $user->username }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Posts -->
                <div class="post-container">
                    @forelse ($posts as $post)
                        <x-post :post="$post" />
                    @empty
                        <div class="max-w-2xl mx-auto">
                            {{ __('Start following your friends and enjoy') }}
                        </div>
                    @endforelse
                </div>

            </div>
        </div>

        {{-- Right side --}}

        <!-- Suggestions Column -->
        <div class="hidden w-[68rem] lg:flex lg:flex-col pt-4">


            <div class="col-lg-4">



                <div class="suggestions-container">

                    {{-- user information --}}
                    <div class="profile-card">
                        <img src="{{ Str::startsWith(Auth::user()->image, 'https') ? Auth::user()->image : asset('storage/' . Auth::user()->image) }}"
                            alt="User" class="user-avatar" width="56">
                        <div class="profile-info">
                            <a href="{{ route('user_profile', Auth::user()->username) }}"
                                class="profile-name">{{ Auth::user()->username }}</a>
                            <span class="profile-subtext">{{ Auth::user()->name }}</span>
                        </div>

                        {{-- <button class="switch-btn">Switch</button> --}}
                    </div>

                   


                    <div class="suggestion-card">
                        <div class="suggestion-title">
                            <div class="title-text">Suggestions For You</div>
                            {{-- <a href="#" class="see-all">See All</a> --}}
                        </div>

                        @foreach ($suggestedUsers as $suggested)
                            <div class="suggestion-item">
                                <img src="{{ Str::startsWith($suggested->image, 'http') ? $suggested->image : asset('storage/' . $suggested->image) }}"
                                    alt="User" class="user-avatar" width="32">
                                <div class="suggestion-info">
                                    <a href="{{ route('user_profile', $suggested->username) }}"
                                        class="profile-name">{{ $suggested->username }}</a>
                                    <span class="profile-subtext">{{ $suggested->name }}</span>
                                </div>
                                <a href="{{ route('follow', $suggested->username) }}" class="follow-btn">Follow</a>
                            </div>
                        @endforeach
                    </div>

                     <div role="alert"
                        class="{{ session('status') ? '' : 'hidden' }} w-100 p-4 mb-4 text-sm text-green-500 rounded:1g absolute right-10 shadow shadow-neutral-200">
                        <span class="font-medium">{{ session('status') }}</span>
                    </div>

                


                </div>
            </div>
        </div>


    </div>
    </div>
</x-app-layout>
