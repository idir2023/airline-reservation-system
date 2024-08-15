<div class="navbar-nav ms-auto py-0">
    <a href="{{ url('/') }}"
        class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
    <a href="{{ route('visa') }}"
        class="nav-item nav-link {{ request()->routeIs('visa') ? 'active' : '' }}">Visas</a>
    <a href="{{ route('actualite') }}"
        class="nav-item nav-link {{ request()->routeIs('actualite') ? 'active' : '' }}">Actualite</a>
    <a href="{{ route('consultation') }}"
        class="nav-item nav-link {{ request()->routeIs('consultation') ? 'active' : '' }}">Consultation</a>
    <a href="{{ route('assuarance') }}"
        class="nav-item nav-link {{ request()->routeIs('assuarance') ? 'active' : '' }}">Assurances</a>
    <a href="{{ route('contact') }}"
        class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
    <a href="{{ route('reviews') }}"
        class="nav-item nav-link {{ request()->routeIs('reviews') ? 'active' : '' }}">Reviews </a>
</div>
@if(Auth::check())
    <!-- Utilisateur connecté, afficher le bouton de déconnexion -->
    <a href="{{ route('logout') }}" class="nav-item nav-link btn btn-outline-danger me-2"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <!-- Utilisateur non connecté, afficher les liens de connexion et d'inscription -->
    <a href="{{ route('login') }}" class="nav-item nav-link btn btn-outline-primary me-2">Login</a>
    <a href="{{ route('register') }}" class="nav-item nav-link btn btn-primary text-white">Sign Up</a>
@endif
