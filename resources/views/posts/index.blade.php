{{-- <x-app-layout>

</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram-style Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ig-primary: #405DE6;
            --ig-secondary: #5851DB;
            --ig-accent: #833AB4;
            --ig-danger: #E1306C;
            --ig-warning: #FCAF45;
            --ig-text: #262626;
            --ig-background: #FAFAFA;
            --ig-border: #DBDBDB;
        }
        
        body {
            background-color: var(--ig-background);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--ig-text);
            padding-top: 60px;
        }
        
        .navbar {
            background-color: white;
            border-bottom: 1px solid var(--ig-border);
            padding: 8px 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(45deg, var(--ig-accent), var(--ig-danger), var(--ig-warning));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .search-box {
            background: var(--ig-background);
            border: 1px solid var(--ig-border);
            border-radius: 8px;
            padding: 5px 15px;
            width: 250px;
        }
        
        .nav-icon {
            font-size: 1.5rem;
            color: var(--ig-text);
            margin-left: 20px;
        }
        
        .post-container {
            max-width: 614px;
            margin: 0 auto 30px;
            background: white;
            border: 1px solid var(--ig-border);
            border-radius: 8px;
        }
        
        .post-header {
            padding: 14px 16px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid var(--ig-border);
        }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 12px;
        }
        
        .username {
            font-weight: 600;
            color: var(--ig-text);
            text-decoration: none;
            flex-grow: 1;
        }
        
        .post-more {
            color: var(--ig-text);
            font-size: 1.2rem;
        }
        
        .post-image {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
        }
        
        .post-actions {
            padding: 12px 16px;
            display: flex;
            align-items: center;
        }
        
        .action-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            margin-right: 16px;
            color: var(--ig-text);
            padding: 0;
        }
        
        .action-btn.save {
            margin-right: 0;
            margin-left: auto;
        }
        
        .action-btn.liked {
            color: var(--ig-danger);
        }
        
        .post-likes {
            padding: 0 16px;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .post-caption {
            padding: 0 16px;
            margin-bottom: 8px;
        }
        
        .post-caption .username {
            font-weight: 600;
            margin-right: 5px;
        }
        
        .post-comments {
            padding: 0 16px;
            color: #8e8e8e;
            margin-bottom: 8px;
        }
        
        .post-time {
            padding: 0 16px;
            color: #8e8e8e;
            font-size: 0.8rem;
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        
        .add-comment {
            padding: 12px 16px;
            border-top: 1px solid var(--ig-border);
            display: flex;
            align-items: center;
        }
        
        .comment-input {
            flex-grow: 1;
            border: none;
            background: none;
            outline: none;
            padding: 5px;
        }
        
        .post-btn {
            color: var(--ig-primary);
            font-weight: 600;
            background: none;
            border: none;
            opacity: 0.4;
        }
        
        .post-btn.active {
            opacity: 1;
        }
        
        .stories-container {
            max-width: 614px;
            margin: 0 auto 24px;
            background: white;
            border: 1px solid var(--ig-border);
            border-radius: 8px;
            padding: 16px;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .story {
            display: inline-block;
            text-align: center;
            margin-right: 15px;
        }
        
        .story-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            padding: 2px;
            background: linear-gradient(45deg, var(--ig-danger), var(--ig-warning));
            margin-bottom: 5px;
        }
        
        .story-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }
        
        .story-username {
            font-size: 0.8rem;
            color: var(--ig-text);
        }
        
        .suggestions-container {
            position: fixed;
            top: 100px;
            right: calc((100% - 935px) / 2);
            width: 293px;
        }
        
        .suggestion-card {
            background: white;
            border: 1px solid var(--ig-border);
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
        }
        
        .profile-card {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .profile-info {
            flex-grow: 1;
            margin-left: 12px;
        }
        
        .profile-name {
            font-weight: 600;
            color: var(--ig-text);
            text-decoration: none;
            display: block;
        }
        
        .profile-subtext {
            color: #8e8e8e;
            font-size: 0.9rem;
        }
        
        .switch-btn {
            color: var(--ig-primary);
            font-weight: 600;
            background: none;
            border: none;
            padding: 0;
        }
        
        .suggestion-title {
            display: flex;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        
        .title-text {
            color: #8e8e8e;
            font-weight: 600;
        }
        
        .see-all {
            color: var(--ig-text);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .suggestion-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        
        .suggestion-info {
            flex-grow: 1;
            margin-left: 12px;
        }
        
        .follow-btn {
            color: var(--ig-primary);
            font-weight: 600;
            background: none;
            border: none;
            padding: 0;
            font-size: 0.9rem;
        }
        
        @media (max-width: 1000px) {
            .suggestions-container {
                display: none;
            }
        }
        
        @media (max-width: 614px) {
            .post-container, .stories-container {
                border: none;
                border-radius: 0;
                border-bottom: 1px solid var(--ig-border);
            }
            
            .search-box {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-camera-retro me-1"></i> InstaStyle
            </a>
            
            <div class="search-box">
                <input type="text" class="form-control border-0 bg-transparent" placeholder="Search">
            </div>
            
            <div class="d-flex">
                <a href="#" class="nav-icon"><i class="fas fa-home"></i></a>
                <a href="#" class="nav-icon"><i class="far fa-paper-plane"></i></a>
                <a href="#" class="nav-icon"><i class="far fa-plus-square"></i></a>
                <a href="#" class="nav-icon"><i class="far fa-compass"></i></a>
                <a href="#" class="nav-icon"><i class="far fa-heart"></i></a>
                
                <div class="dropdown">
                    <a href="#" class="nav-icon" id="profileDropdown" data-bs-toggle="dropdown">
                        <i class="far fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-bookmark me-2"></i> Saved</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Feed Column -->
            <div class="col-lg-8">
                <!-- Stories -->
                <div class="stories-container">
                    <div class="story">
                        <div class="story-avatar">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Your Story">
                        </div>
                        <div class="story-username">Your Story</div>
                    </div>
                    
                    <div class="story">
                        <div class="story-avatar">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Sarah">
                        </div>
                        <div class="story-username">sarah_m</div>
                    </div>
                    
                    <div class="story">
                        <div class="story-avatar">
                            <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Mike">
                        </div>
                        <div class="story-username">mike_t</div>
                    </div>
                    
                    <div class="story">
                        <div class="story-avatar">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Emma">
                        </div>
                        <div class="story-username">emma_w</div>
                    </div>
                    
                    <div class="story">
                        <div class="story-avatar">
                            <img src="https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Jessica">
                        </div>
                        <div class="story-username">jessica_k</div>
                    </div>
                    
                    <div class="story">
                        <div class="story-avatar">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="Sophia">
                        </div>
                        <div class="story-username">sophia_l</div>
                    </div>
                </div>

                <!-- Posts -->
                <div class="post-container">
                    <div class="post-header">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar">
                        <a href="#" class="username">sarah_m</a>
                        <a href="#" class="post-more"><i class="fas fa-ellipsis-h"></i></a>
                    </div>
                    
                    <img src="https://images.unsplash.com/photo-1677442135135-416f8aa26a5b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=614&q=80" alt="Post" class="post-image">
                    
                    <div class="post-actions">
                        <button class="action-btn"><i class="far fa-heart"></i></button>
                        <button class="action-btn"><i class="far fa-comment"></i></button>
                        <button class="action-btn"><i class="far fa-paper-plane"></i></button>
                        <button class="action-btn save"><i class="far fa-bookmark"></i></button>
                    </div>
                    
                    <div class="post-likes">12,345 likes</div>
                    
                    <div class="post-caption">
                        <a href="#" class="username">sarah_m</a>
                        Beautiful sunset at the beach! 🌅 What's your favorite time of day? #sunset #beach #vacation
                    </div>
                    
                    <div class="post-comments">View all 243 comments</div>
                    
                    <div class="post-time">2 hours ago</div>
                    
                    <div class="add-comment">
                        <input type="text" class="comment-input" placeholder="Add a comment...">
                        <button class="post-btn">Post</button>
                    </div>
                </div>

                <div class="post-container">
                    <div class="post-header">
                        <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar">
                        <a href="#" class="username">mike_t</a>
                        <a href="#" class="post-more"><i class="fas fa-ellipsis-h"></i></a>
                    </div>
                    
                    <img src="https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=614&q=80" alt="Post" class="post-image">
                    
                    <div class="post-actions">
                        <button class="action-btn liked"><i class="fas fa-heart"></i></button>
                        <button class="action-btn"><i class="far fa-comment"></i></button>
                        <button class="action-btn"><i class="far fa-paper-plane"></i></button>
                        <button class="action-btn save"><i class="far fa-bookmark"></i></button>
                    </div>
                    
                    <div class="post-likes">8,932 likes</div>
                    
                    <div class="post-caption">
                        <a href="#" class="username">mike_t</a>
                        Coffee and coding - the perfect combination! ☕️ What's your setup look like? #developer #coding #coffee
                    </div>
                    
                    <div class="post-comments">View all 187 comments</div>
                    
                    <div class="post-time">5 hours ago</div>
                    
                    <div class="add-comment">
                        <input type="text" class="comment-input" placeholder="Add a comment...">
                        <button class="post-btn">Post</button>
                    </div>
                </div>

                <div class="post-container">
                    <div class="post-header">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar">
                        <a href="#" class="username">emma_w</a>
                        <a href="#" class="post-more"><i class="fas fa-ellipsis-h"></i></a>
                    </div>
                    
                    <img src="https://images.unsplash.com/photo-1677442135136-09d9dee9f1b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=614&q=80" alt="Post" class="post-image">
                    
                    <div class="post-actions">
                        <button class="action-btn"><i class="far fa-heart"></i></button>
                        <button class="action-btn"><i class="far fa-comment"></i></button>
                        <button class="action-btn"><i class="far fa-paper-plane"></i></button>
                        <button class="action-btn save"><i class="far fa-bookmark"></i></button>
                    </div>
                    
                    <div class="post-likes">15,678 likes</div>
                    
                    <div class="post-caption">
                        <a href="#" class="username">emma_w</a>
                        Morning hike with the best views! 🏞️ Nothing like fresh mountain air to start the day. #hiking #mountains #nature
                    </div>
                    
                    <div class="post-comments">View all 321 comments</div>
                    
                    <div class="post-time">1 day ago</div>
                    
                    <div class="add-comment">
                        <input type="text" class="comment-input" placeholder="Add a comment...">
                        <button class="post-btn">Post</button>
                    </div>
                </div>
            </div>

            <!-- Suggestions Column -->
            <div class="col-lg-4">
                <div class="suggestions-container">
                    <div class="profile-card">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar" width="56">
                        <div class="profile-info">
                            <a href="#" class="profile-name">your_username</a>
                            <span class="profile-subtext">John Smith</span>
                        </div>
                        <button class="switch-btn">Switch</button>
                    </div>
                    
                    <div class="suggestion-card">
                        <div class="suggestion-title">
                            <div class="title-text">Suggestions For You</div>
                            <a href="#" class="see-all">See All</a>
                        </div>
                        
                        <div class="suggestion-item">
                            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar" width="32">
                            <div class="suggestion-info">
                                <a href="#" class="profile-name">sophia_l</a>
                                <span class="profile-subtext">Followed by jessica_k + 5 more</span>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                        
                        <div class="suggestion-item">
                            <img src="https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar" width="32">
                            <div class="suggestion-info">
                                <a href="#" class="profile-name">jessica_k</a>
                                <span class="profile-subtext">Followed by emma_w + 12 more</span>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                        
                        <div class="suggestion-item">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar" width="32">
                            <div class="suggestion-info">
                                <a href="#" class="profile-name">sarah_m</a>
                                <span class="profile-subtext">Followed by mike_t + 8 more</span>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                        
                        <div class="suggestion-item">
                            <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar" width="32">
                            <div class="suggestion-info">
                                <a href="#" class="profile-name">mike_t</a>
                                <span class="profile-subtext">Followed by emma_w + 15 more</span>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                    </div>
                    
                    <div class="suggestion-card">
                        <div class="suggestion-title">
                            <div class="title-text">Recent Follows</div>
                        </div>
                        
                        <div class="suggestion-item">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" alt="User" class="user-avatar" width="32">
                            <div class="suggestion-info">
                                <a href="#" class="profile-name">emma_w</a>
                                <span class="profile-subtext">Started following you</span>
                            </div>
                            <button class="follow-btn">Follow back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Like button functionality
        document.querySelectorAll('.action-btn').forEach(btn => {
            if (btn.querySelector('.fa-heart')) {
                btn.addEventListener('click', function() {
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('far')) {
                        icon.classList.replace('far', 'fas');
                        icon.classList.add('liked');
                        this.classList.add('liked');
                    } else {
                        icon.classList.replace('fas', 'far');
                        icon.classList.remove('liked');
                        this.classList.remove('liked');
                    }
                });
            }
        });

        // Comment input functionality
        document.querySelectorAll('.comment-input').forEach(input => {
            const postBtn = input.nextElementSibling;
            
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    postBtn.classList.add('active');
                } else {
                    postBtn.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>