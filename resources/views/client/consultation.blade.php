<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Success Modal Start -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="fas fa-check-circle fa-4x text-success"></i>
                    <!-- Success message will be injected here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Modal End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="#" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Visas</h1>
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
                        <h1 class="display-3 text-white animated slideInDown">Consultation</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Consultation</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Consultation Pack</h6>
                <h1 class="mb-5">Awesome Packages</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($consultations as $consultation)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ Storage::disk('public')->url($consultation->image) }}"
                                    alt="">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa text-primary me-2"></i>{{ $consultation->title }}
                                </small>
                            </div>
                            <div class="text-center p-4">
                                <p>{{ $consultation->description }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a type="button" data-bs-toggle="modal"
                                        data-bs-target="#consultationModal{{ $consultation->id }}">
                                        <span class="btn btn-sm btn-primary px-3 border-end"
                                            style="border-radius: 30px 0 0 30px;">Apply</span>
                                        <span class="btn btn-sm btn-primary px-3"
                                            style="border-radius: 0 30px 30px 0;">Now</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Modal Start -->
                            <div class="modal fade" id="consultationModal{{ $consultation->id }}" tabindex="-1"
                                aria-labelledby="consultationModalLabel{{ $consultation->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="consultationModalLabel{{ $consultation->id }}">
                                                {{ $consultation->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="consultationForm{{ $consultation->id }}" method="POST"
                                                action="{{ route('consultation-formulaire.store') }}">
                                                @csrf
                                                <input type="hidden" name="consultation_id"
                                                    value="{{ $consultation->id }}">

                                                <!-- Nom -->
                                                <div class="mb-3">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input type="text" class="form-control" id="nom"
                                                        name="nom" placeholder="Enter Last Name">
                                                </div>

                                                <!-- Prenom -->
                                                <div class="mb-3">
                                                    <label for="prenom" class="form-label">Prenom</label>
                                                    <input type="text" class="form-control" id="prenom"
                                                        name="prenom" placeholder="Enter First Name">
                                                </div>

                                                <!-- Description -->
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                                                </div>

                                                <!-- Numéro Téléphone -->
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Numéro Téléphone</label>
                                                    <input type="text" class="form-control" id="telephone"
                                                        name="numerTele" placeholder="Enter Phone Number">
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal End -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Package End -->

    <!-- Footer Start -->
    @include('client.layout.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    @include('client.layout.script')

    <!-- jQuery AJAX Script -->
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function(response) {
                        $('#successModal .modal-body').text(response.success ||
                            'Operation completed successfully');
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'successModal'));
                        successModal.show();
                        form[0].reset(); // Optional: reset form fields
                        form.closest('.modal').modal('hide'); // Hide the modal
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        $('#successModal .modal-body').text(
                            'An error occurred. Please try again.');
                        var successModal = new bootstrap.Modal(document.getElementById(
                            'successModal'));
                        successModal.show();
                    }
                });
            });
        });
    </script>

</body>

</html>
