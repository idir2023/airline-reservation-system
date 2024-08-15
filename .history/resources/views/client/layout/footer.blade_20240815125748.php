<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Company</h4>
    
    <a href="{{ route('visa') }}"
    class="btn btn-link" {{ request()->routeIs('visa') ? 'active' : '' }}">Visas</a>
    <a href="{{ route('actualite') }}"
    class="btn btn-link" {{ request()->routeIs('actualite') ? 'active' : '' }}">Actualite</a>
    <a href="{{ route('consultation') }}"
    class="btn btn-link" {{ request()->routeIs('consultation') ? 'active' : '' }}">Consultation</a>
    <a href="{{ route('assuarance') }}"
    class="btn btn-link" {{ request()->routeIs('assuarance') ? 'active' : '' }}">Assurances</a>
    <a href="{{ route('contact') }}"
    class="btn btn-link  class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
    <a href="{{ route('reviews') }}"
    class="btn btn-link {{ request()->routeIs('reviews') ? 'active' : '' }}">Reviews </a>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            </div>
        </div>
    </div>
</div>