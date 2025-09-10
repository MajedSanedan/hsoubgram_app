<x-app-layout>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Feed Column -->
            {{-- Left side --}}
            <div class="col-lg-8">
                <!-- Stories -->

                <div class="stories-container">
                    <div class="story">
                        <div class="story-avatar">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80"
                                alt="Your Story">
                        </div>
                        <div class="story-username">Your Story</div>
                    </div>
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
        <div class="col-lg-4">
            <div class="suggestions-container">

                {{-- user information --}}
                <div class="profile-card">
                    <img src="{{Auth::user()->image}}"
                        alt="User" class="user-avatar" width="56">
                    <div class="profile-info">
                        <a href="{{route('user_profile',Auth::user()->username)}}" class="profile-name">{{ Auth::user()->username }}</a>
                        <span class="profile-subtext">{{ Auth::user()->name}}</span>
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
                            <img src="{{$suggested->image}}"
                                alt="User" class="user-avatar" width="32">
                            <div class="suggestion-info">
                                <a href="{{route('user_profile',$suggested->username)}}" class="profile-name">{{$suggested->username}}</a>
                                <span class="profile-subtext">{{$suggested->name}}</span>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
    </div>
</x-app-layout>
