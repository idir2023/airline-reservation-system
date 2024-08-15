<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<body>
    
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
                        <h1 class="display-3 text-white animated slideInDown">Reviews</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Reviews</li>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Reviews</h6>
            <h1 class="mb-5">Our Clients' Feedback</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                       
                         <th>Nom Complet</th>
                         <th>Lieux de Dépot</th>
                         <th>Date de Dépôt</th>
                         <th>Date de Réponse</th>
                         <th>Accordé ou Non</th>
                         <th>Description</th>

                               
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

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Submit Your Review</h6>
                <h1 class="mb-5">We Value Your Feedback</h1>
            </div>
            <form id="reviewForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="fullName" placeholder="Full Name">
                            <label for="fullName">Nom complet</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="dateDepot" placeholder="Date de dépôt">
                            <label for="dateDepot">Date de dépôt</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" id="lieu_depot_id" name="lieu_depot_id" required>
                                @foreach ($lieuDepotOptions as $lieuDepot)
                                    <option value="{{ $lieuDepot->id }}">{{ $lieuDepot->name }}</option>
                                @endforeach
                            </select>
                            <label for="lieu_depot_id">Lieu de Dépôt</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="dateReponse" placeholder="Date de réponse">
                            <label for="dateReponse">Date de réponse</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" id="accordOuNon">
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                            <label for="accordOuNon">Accord ou Non</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Description" id="description" style="height: 100px"></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="button" onclick="addReview()">Submit Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Reviews Form End -->
    
   









    
    <!-- Footer Start -->
    @include('client.layout.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
       @include('client.layout.script')

</body>

</html>