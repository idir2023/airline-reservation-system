<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<body>
    
    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h3 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Arfak Voyage</h3>

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
                        <h1 class="display-3 text-white animated slideInDown">Contactez-nous</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Contactez-nous</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Contact Start --><!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contactez-nous</h6>
            <h1 class="mb-5">Contactez-nous pour toute question</h1>  
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Contact Details Section -->
            <div class="col-lg-4 col-md-6 wow fadeInUp text-center" data-wow-delay="0.1s">
                <h5>Get In Touch</h5>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos.</p>
                <!-- Office Address -->
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary rounded-circle" style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Office</h5>
                        <p class="mb-0">Bloc B Almassira Num 564, Agadir, Kenitra</p>
                    </div>
                </div>
                <!-- Mobile Number -->
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary rounded-circle" style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Mobile</h5>
                        <p class="mb-0">+212 650-184658</p>
                    </div>
                </div>
                <!-- Email Address -->
                <div class="d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary rounded-circle" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">info@example.com</p>
                    </div>
                </div>
            </div>
            
        <!-- Contact Form Section -->
<div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
     <!-- Success Alert -->
     @if(session('message'))
     <div class="alert alert-success mt-3">
         {{ session('message') }}
     </div>
 @endif
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="nom" placeholder="Your Name" required>
                    <label for="name">Your Name</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    <label for="email">Your Email</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="subject" name="tele" placeholder="Téléphone" required>
                    <label for="subject">Téléphone</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="description" style="height: 100px" required></textarea>
                    <label for="message">Message</label>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
            </div>
        </div>
    </form>

   
</div>

        </div>
    </div>
</div>
<!-- Contact End -->


    <!-- Footer Start -->
    @include('client.layout.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
       @include('client.layout.script')

</body>

</html>