<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Visas</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @include('client.layout.link')
            </div>
        </nav>
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Actualités</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Actualités</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

<!-- Actualités Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Actualités</h6>
            <h1 class="mb-5">Nos Dernières Actualités</h1>
        </div>
        <div class="row g-4">
            <!-- Actualité 1 -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <img src="{{ asset('client/path/to/your/image1.jpg')}}" alt="Actualité 1" class="img-fluid mb-3 rounded" style="width: 100%; height: auto;">
                    <div class="p-4">
                        <h5>Actualité 1</h5>
                        <p>Description de l'actualité 1. Détails sur les événements récents ou les nouvelles importantes.</p>
                    </div>
                </div>
            </div>
            <!-- Actualité 2 -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <img src="{{ asset('client/path/to/your/image2.jpg')}}" alt="Actualité 2" class="img-fluid mb-3 rounded" style="width: 100%; height: auto;">
                    <div class="p-4">
                        <h5>Actualité 2</h5>
                        <p>Description de l'actualité 2. Explications supplémentaires et contexte pour cette nouvelle.</p>
                    </div>
                </div>
            </div>
            <!-- Actualité 3 -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <img src="{{ asset('client/path/to/your/image3.jpg')}}" alt="Actualité 3" class="img-fluid mb-3 rounded" style="width: 100%; height: auto;">
                    <div class="p-4">
                        <h5>Actualité 3</h5>
                        <p>Description de l'actualité 3. Informations clés et résumés sur les dernières nouvelles.</p>
                    </div>
                </div>
            </div>
            <!-- Actualité 4 -->
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <img src="{{ asset('client/path/to/your/image4.jpg')}}" alt="Actualité 4" class="img-fluid mb-3 rounded" style="width: 100%; height: auto;">
                    <div class="p-4">
                        <h5>Actualité 4</h5>
                        <p>Description de l'actualité 4. Dernières mises à jour et nouvelles importantes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Actualités Section End -->

    <!-- Footer Start -->
    @include('client.layout.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('client.layout.script')

</body>

</html>