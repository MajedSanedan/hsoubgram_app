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
    @vite(['resources/css/style.css', 'resources/js/app.js'])

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-camera-retro me-1"></i>   <x-application-logo class="w-80 h-auto fill-current text-gray-500" />
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

    {{$slot}}

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