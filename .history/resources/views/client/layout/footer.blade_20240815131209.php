<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Company Links Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Company</h4>
                <a href="{{ route('visa') }}" class="btn btn-link {{ request()->routeIs('visa') ? 'active' : '' }}">Visas</a>
                <a href="{{ route('actualite') }}" class="btn btn-link {{ request()->routeIs('actualite') ? 'active' : '' }}">Actualite</a>
                <a href="{{ route('consultation') }}" class="btn btn-link {{ request()->routeIs('consultation') ? 'active' : '' }}">Consultation</a>
                <a href="{{ route('assuarance') }}" class="btn btn-link {{ request()->routeIs('assuarance') ? 'active' : '' }}">Assurances</a>
                <a href="{{ route('contact') }}" class="btn btn-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
                <a href="{{ route('reviews') }}" class="btn btn-link {{ request()->routeIs('reviews') ? 'active' : '' }}">Reviews</a>
            </div>  

            <!-- Contact Information Section -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Arfak voyage bloc b Almassira Num 564 Agadir</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 650-184658</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <!-- Form Section -->
            <div class="col-lg-6 col-md-12">
                <h4 class="text-white mb-3">Ajouter un Lieu de Dépôt</h4>
                <form action="{{ route('lieu_depots.store') }}" method="POST" class="bg-light p-4 rounded">
                    @csrf
                    <div class="mb-3 d-flex">
                        <input type="text" class="form-control me-2" id="name" name="name" placeholder="Nom du Lieu de Dépôt" value="{{ old('name') }}" required>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                    <div class="valid-feedback">
                        @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                        @lang('validation.required', ['attribute' => __('Nom du Lieu de Dépôt')])
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
