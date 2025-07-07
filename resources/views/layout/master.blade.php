<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- import font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Agdasima&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Bootstrap JS and Popper.js (required for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>


    {{-- boostrap md5 version --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script> --}}

    {{-- font awesome --}}
    {{-- tailwind --}}
    {{-- @vite('resources/css/app.css') --}}
    {{-- flowbite --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> --}}

    {{-- css # styles --}}
    <link rel="stylesheet" href="{{ asset('css/layoutMaster.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/upNews.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/upNews.css') }}"> --}}

    {{-- sweet alert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    {{-- import login.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset(path: 'js/login.js') }}"></script>

    <title>Crypto News</title>
</head>

<body>

    <!-- Navbar -->
    {{-- navbar boostrap + script --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            });
        </script>
    @endif
    <!-- Updated Navbar Structure -->
    <nav class="navbar sticky-top navbar-expand-lg shadow-sm p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Prime<span>News</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('menuHome')" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('category/Economy') ? 'active' : '' }}"
                            href="{{ route('category', 'Economy') }}">Economy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('category/Politic') ? 'active' : '' }}"
                            href="{{ route('category', 'Politic') }}">Politics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('category/Technology') ? 'active' : '' }}"
                            href="{{ route('category', 'Technology') }}">Technology</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::is('category/Influencers') ? 'active' : '' }}"
                            href="{{ route('category', 'Influencers') }}">Influencers</a>
                    </li> --}}
                </ul>

                <!-- Updated navbar actions section -->
                <div class="navbar-actions">
                    <!-- Search Section -->
                    <div class="search-section">
                        <form action="/search" method="GET" style="margin: 0;">
                            <div style="position: relative;">
                                <input class="search-input" type="search" name="q" placeholder="Search News"
                                    aria-label="Search" value="{{ request('q') }}" />
                                <button class="search-btn" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Authentication Section -->
                    <div class="auth-buttons">
                        @if (Auth::check())
                            {{-- User is authenticated --}}
                            @csrf
                            <div class="user-dropdown dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-person-lines-fill"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/dashboard/{{ Auth::user()->id }}">Dashboard</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            {{-- User is not authenticated --}}
                            <button class="auth-link" onclick="showLogin()">SIGN IN</button>
                            <div class="divider"></div>
                            <button class="auth-link" onclick="showRegister()">CREATE FREE ACCOUNT</button>
                        @endif
                    </div>
                </div>

                <!-- Modal Overlay -->
                <div class="modal-overlay" id="modalOverlay"></div>

                <!-- Login Modal -->
                <div class="modal-container" id="loginModal" style="display: none;">
                    <div class="modal-header">
                        <button class="close-btn" onclick="closeModal()"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <p class="brand">Prime<span>News</span></p>
                        <h2 class="modal-title text-center mb-2">Sign In</h2>
                        <form id="loginForm" method="post" action="/login">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Email or Username *</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password *</label>
                                <div class="password-container">
                                    <input type="password" class="form-control" name="password" id="loginPassword"
                                        required>
                                    <button type="button" class="password-toggle"
                                        onclick="togglePassword('loginPassword')">
                                        <i class="far fa-eye" id="loginPasswordIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="checkbox-container">
                                <input type="checkbox" id="staySignedIn" name="staySignedIn">
                                <label class="checkbox-label" for="staySignedIn">Stay Signed In</label>
                            </div>

                            <button type="submit"
                                class="btn btn-primary d-flex justify-content-center text-center w-100">
                                SIGN IN
                            </button>

                            <div class="forgot-password">
                                <a href="#" onclick="showForgotPassword()">Forgot Password?</a>
                            </div>

                            <div class="signup-link">
                                New to PrimeNews? <a href="#" onclick="showRegister()">Create Free Account</a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Register Modal -->
                <div class="modal-container" id="registerModal" style="display: none;">
                    <div class="modal-header">
                        <button class="close-btn" onclick="closeModal()"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="modal-body">
                        <p class="brand">Prime<span>News</span></p>
                        <h2 class="modal-title text-center mb-4">Create Account</h2>
                        <form id="registerForm" method="post" action="/register">
                            @csrf
                            <div class="name-fields">
                                <div class="form-group">
                                    <label class="form-label">First Name *</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" name="last_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password *</label>
                                <div class="password-container">
                                    <input type="password" class="form-control" name="password"
                                        id="registerPassword" required>
                                    <button type="button" class="password-toggle"
                                        onclick="togglePassword('registerPassword')">
                                        <i class="far fa-eye" id="registerPasswordIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Confirm Password *</label>
                                <div class="password-container">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="confirmPassword" required>
                                    <button type="button" class="password-toggle"
                                        onclick="togglePassword('confirmPassword')">
                                        <i class="far fa-eye" id="confirmPasswordIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="checkbox-container">
                                <input type="checkbox" id="agreeTerms" name="agreeTerms" required>
                                <label class="checkbox-label" for="agreeTerms">I agree to the <a href="#">Terms
                                        of Service</a> and <a href="#">Privacy Policy</a></label>
                            </div>

                            <button type="submit"
                                class="btn btn-primary d-flex justify-content-center text-center w-100">
                                CREATE ACCOUNT
                            </button>

                            <div class="signup-link">
                                Already have an account? <a href="#" onclick="showLogin()">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    {{-- navbar tailwind + script --}}
    {{-- <div class="navbar">
        <nav class="bg-white shadow-md">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="flex-shrink-0">
                            <img class="h-8 w-auto "
                                src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>

                        <!-- Navbar links with dynamic active class -->
                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <a href="#" class="nav-link @yield('menuHome') px-3 py-2">Home</a>
                                <a href="#" class="nav-link @yield('menuTeam') px-3 py-2">Team</a>
                                <a href="#" class="nav-link @yield('menuProjects') px-3 py-2">Projects</a>
                                <a href="#" class="nav-link @yield('menuCalendar') px-3 py-2">Calendar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Search and profile dropdown -->
                    <div class="flex items-center space-x-4">
                        <!-- Search input -->
                        <div class="relative">
                            <input type="text" class="bg-gray-100 rounded-md px-3 py-2 text-sm w-48"
                                placeholder="Search">
                        </div>

                        <!-- Notifications -->
                        <button type="button"
                            class="rounded-full p-1 text-gray-400 hover:text-gray-900 focus:ring-2 focus:ring-gray-900 focus:outline-none">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative">
                            <button type="button"
                                class="flex items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleMenu()">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>

                            <!-- Dropdown menu -->
                            <div id="user-menu dropdownNavbar"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 hidden">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("user-menu");
            // Toggle visibility of the menu
            menu.classList.toggle("hidden");
        }
    </script> --}}


    @yield('content')
    <!-- Flowbite CDN -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> --}}
    @include('sweetalert2::index')

@show

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="text-center">
            <!-- Logo -->
            <a href="#" class="footer-logo">Prime<span>News</span></a>

            <!-- Navigation Links -->
            <nav class="footer-nav">
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Press</a>
                <a href="#">Careers</a>
                <a href="#">FAQ</a>
                <a href="#">Legal</a>
                <a href="#">Contact</a>
            </nav>

            <!-- Social Media Section -->
            <div class="footer-social-title">Stay in touch</div>
            <div class="footer-social">
                <a href="#" class="instagram" title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="facebook" title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="twitter" title="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="pinterest" title="Pinterest">
                    <i class="fab fa-pinterest-p"></i>
                </a>
                <a href="#" class="dribbble" title="Dribbble">
                    <i class="fab fa-dribbble"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="footer-copyright">
                © PrimeNews. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<script type="module">
    import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
    Chatbot.init({
        chatflowid: "9811e506-a877-45a0-bcc6-2a7181083ca3",
        apiHost: "http://127.0.0.1:3000",
    })
</script>
</div>
</body>

</html>
