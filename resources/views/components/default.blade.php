<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- GSAP for Animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--- Cookie Consent -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('https://1000logos.net/wp-content/uploads/2021/02/Shopee-logo.png') }}">

</head>
<body>

<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
            <img src="https://1000logos.net/wp-content/uploads/2021/02/Shopee-logo.png" 
                 alt="ShopKaDito Logo" 
                 class="d-inline-block align-top" 
                 width="150">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Main Navigation -->
            @auth
            <ul class="navbar-nav fs-4">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold px-3 py-2 rounded-pill bg-light shadow-sm transition" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold px-3 py-2 rounded-pill bg-light shadow-sm transition" href="#about">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold px-3 py-2 rounded-pill bg-light shadow-sm transition" href="#services">
                        Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold px-3 py-2 rounded-pill bg-light shadow-sm transition" href="#contact">
                        Contact
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold px-3 py-2 rounded-pill bg-light shadow-sm transition" href="{{ route('cart.view') }}">
                        Cart
                    </a>
                </li>
            </ul>
            @endauth

            <!-- Right-aligned Auth Links -->
            <ul class="navbar-nav ms-auto">
                @auth 
          
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li> 
                @else
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-dark px-4 py-2 rounded-pill fw-bold shadow-sm" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item ms-2">
                    <a class="nav-link btn btn-dark text-white px-4 py-2 rounded-pill fw-bold shadow-sm" href="{{ route('register') }}">Register</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script>
    // Add Bootstrap hover effect dynamically
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('mouseover', () => {
            link.classList.add('bg-primary', 'text-white');
        });
        link.addEventListener('mouseleave', () => {
            link.classList.remove('bg-primary', 'text-white');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
</body>
</html>
