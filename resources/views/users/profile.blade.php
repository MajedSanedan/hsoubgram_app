<x-app-layout>

    <!-- Profile Content -->
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <img src="{{ Str::startsWith($user->image, 'http') ? $user->image : asset('storage/' . $user->image) }}"
                alt="{{ $user->username }}" class="profile-avatar mt-10 ">

            <div class="profile-info mt-10">
                <h1 class="profile-username ml-10">{{ $user->username }}</h1>
                <div class="d-flex align-items-center mb-3 ml-10">
                    <div class="profile-actions">
                        @auth


                            @if (auth()->id() == $user->id)
                                <a href="/profile" class="action-btn btn-primary">
                                    <i class="fas fa-edit"></i> {{ __('Edit Profile') }}
                                </a>
                          @else
                          @livewire('followbutton',['userfriend'=>$user,'showbg'=>true,'classes'=>'btn-primary'])
                            @endif
                        @endauth
                        @guest
                            <a href="/login" class="action-btn btn-primary">{{ __('follow') }}</a>
                        @endguest
                        <button class="action-btn btn-secondary">{{ __('message') }}</button>
                        <button class="action-btn btn-secondary"><i class="fas fa-user-plus"></i></button>
                        <button class="btn-more">···</button>
                    </div>
                </div>

                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-count">{{ $user->posts->count() }}</span>
                        <div class="stat-label">{{ $user->posts->count() > 1 ? __('posts') : __('post') }}</div>
                    </div>
                    <div class="stat-item">
                        <span
                            class="stat-count">{{ $user->followers()->wherePivot('confirmed', true)->get()->count() }}</span>
                        <div class="stat-label"> <a href="">
                                {{ $user->followers()->count() > 1 ? __('followers') : __('follower') }}</a></div>
                    </div>
                    <div class="stat-item">
                        <span
                            class="stat-count">{{ $user->following()->wherePivot('confirmed', true)->get()->count() }}</span>
                        <div class="stat-label"><a href=""> {{ __('following') }}</a></div>
                    </div>
                </div>

                <div class="profile-bio ml-10">
                    <div class="profile-name"> {{ $user->name }}</div>
                    {!! nl2br(e($user->bio)) !!}
                    <a href="#" class="profile-website">www.{{ $user->username }}.com</a>
                </div>
            </div>
        </div>


        <!-- Profile Tabs -->
        <div class="profile-tabs">
            <a href="#" class="profile-tab active">
                <i class="fas fa-table"></i> المنشورات
            </a>
            <a href="#" class="profile-tab">
                <i class="fas fa-tv"></i> الريلات
            </a>
            <a href="#" class="profile-tab">
                <i class="fas fa-bookmark"></i> المحفوظات
            </a>
            <a href="#" class="profile-tab">
                <i class="fas fa-user-tag"></i> الوسوم
            </a>
        </div>

        @if ($user->posts->count() > 0 && (!$user->prvate_account || auth()->id() == $user->id))
            <!-- Posts Grid -->
            <div class="posts-grid">
                <!-- Post 1 -->
                @foreach ($user->posts as $post)
                    <a href="/post/{{ $post->slug }}">
                        <div class="post-item">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post" class="post-image">
                            @if (auth()->id() == $user->id)
                                <div class="post-hover">
                                    <div class="post-stats">
                                        <i class="fas fa-heart"></i> {{ $post->likes->count() }}
                                    </div>
                                    <div class="post-stats">
                                        <i class="fas fa-comment"></i> {{ $post->comments->count() }}
                                    </div>

                                </div>
                            @endif

                        </div>
                    </a>
                @endforeach

            </div>
        @else
            <div class="w-full text-center mt-20">
                @if ($user->prvate_account && $user->id != auth()->id())
                    {{ __('this is private account follow to see posts') }}
                @else
                    {{ __('No posts to show') }}
                @endif
            </div>
        @endif

    </div>


</x-app-layout>
