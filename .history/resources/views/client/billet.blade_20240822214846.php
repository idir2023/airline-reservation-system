<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<body>

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <img src="{{ asset('client/img/2.png') }}" alt="Logo" style="width: 200px; height: auto;">
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
                        <h1 class="display-3 text-white animated slideInDown">Avis</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Avis</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Display Reviews Table Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Avis</h6>
                <h1 class="mb-5">Retour de nos clients</h1>
            </div>

                    

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Nom Complet</th>
                            <th>Date de Dépôt</th>
                            <th>Date de Réponse</th>
                            <th>Lieu de Dépôt</th>
                            <th>Accord ou Non</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                       

                        </tr>
                        </thead>
                    <tbody id="reviewsTableBody">
                        <!-- Reviews will be appended here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Display Reviews Table End -->



    <!-- Footer Start -->
    @include('client.layout.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    @include('client.layout.script')

    

</body>

</html>
