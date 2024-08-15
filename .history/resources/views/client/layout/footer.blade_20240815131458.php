<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5 justify-content-center text-center">
            <!-- Company Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Company</h4>
                <a href="{{ route('visa') }}"
                   class="btn btn-link text-light d-block mb-2 {{ request()->routeIs('visa') ? 'active' : '' }}">Visas</a>
                <a href="{{ route('actualite') }}"
                   class="btn btn-link text-light d-block mb-2 {{ request()->routeIs('actualite') ? 'active' : '' }}">Actualité</a>
                <a href="{{ route('consultation') }}"
                   class="btn btn-link text-light d-block mb-2 {{ request()->routeIs('consultation') ? 'active' : '' }}">Consultation</a>
                <a href="{{ route('assuarance') }}"
                   class="btn btn-link text-light d-block mb-2 {{ request()->routeIs('assuarance') ? 'active' : '' }}">Assurances</a>
                <a href="{{ route('contact') }}"
                   class="btn btn-link text-light d-block mb-2 {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
                <a href="{{ route('reviews') }}"
                   class="btn btn-link text-light d-block mb-2 {{ request()->routeIs('reviews') ? 'active' : '' }}">Reviews</a>
            </div>
            <!-- Contact Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt "></i>Arfak voyage, Bloc B Almassira Num 564, Agadir</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 650-184658</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gmail.com</p>
                <div class="d-flex justify-content-center pt-3">
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .footer h4 {
    font-size: 1.5rem;
    font-weight: bold;
}

.footer .btn-link {
    font-size: 1rem;
    transition: color 0.3s ease;
}

.footer .btn-link:hover {
    color: #ddd;
    text-decoration: underline;
}

.footer .btn-social {
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.footer .btn-social:hover {
    background-color: #0056b3;
}

.footer .fa {
    font-size: 1.2rem;
}

</style>