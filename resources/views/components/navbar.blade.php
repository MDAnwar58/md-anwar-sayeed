 <!-- ====================navbar start==================== -->
 <nav class="navbar navbar-expand-lg navbar_bg">
    <div class="container">
        <a class="navbar-brand text-primary" href="{{ url('/') }}">MR-X</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-capitalize">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('resume') ? 'active' : '' }}" href="{{ url('/resume') }}">resume</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('projects') ? 'active' : '' }}" href="{{ url('/projects') }}">projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ====================navbar end==================== -->
