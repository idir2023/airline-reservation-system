<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
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
                        <h1 class="display-3 text-white animated slideInDown">Informations sur Visas</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Informations sur Visas
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Visa Information Display Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Visa Information</h6>
                <h1 class="mb-5">Available Visa Types</h1>
            </div>
            <div class="row g-4">
                @foreach($visas as $visa)
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="visa-item border rounded p-4">
                        @if($visa->image)
                        <img class="img-fluid" src="{{ Storage::disk('public')->url($assurance->image) }}"" alt="{{ $visa->type_visa }}" class="img-fluid mb-3 rounded" style="width: 100%; height: auto;">
                        @endif
                        <h5 class="mb-3">{{ $visa->type_visa }}</h5>
                        <p><strong>Motif:</strong> {{ $visa->motif }}</p>
                        <p><strong>Destination:</strong> {{ $visa->destination_visa }}</p>
                        <p><strong>Description:</strong> {{ $visa->description }}</p>
                        @if($visa->pdf_path)
                            <a href="{{ asset('storage/' . $visa->pdf_path) }}" class="btn btn-primary mt-2" target="_blank">View PDF</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Visa Information Display End -->
    

    <!-- Footer Start -->
  @include('client.layout.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
  @include('client.layout.script')
</body>

</html>
