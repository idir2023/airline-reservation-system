<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<body>

    <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Success message will be inserted here by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Error message will be inserted here by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


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
                        <h1 class="display-3 text-white animated slideInDown">Assurances</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Assurances</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="position-relative w-75 mx-auto animated slideInDown">
                        <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" id="title" name="title"
                            placeholder="Search by title">
                        <button type="button"
                            class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2"
                            style="margin-top: 7px;">Search</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Assurances Section Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title bg-white text-center text-primary px-3">Assurances</h6>
                    <h1 class="mb-5">Nos Offres d'Assurance</h1>
                </div>
                <div class="row gy-5 gx-4 justify-content-center">
                    @foreach ($assurances as $assurance)
                        <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp"
                            data-wow-delay="0.{{ $loop->index * 0.2 }}s">
                            <div class="position-relative border border-primary pt-5 pb-4 px-4">
                                <img class="img-fluid" src="{{ Storage::disk('public')->url($assurance->image) }}"
                                    alt="{{ $assurance->title }}" class="img-fluid mb-3 rounded-circle"
                                    style="width: 100px; height: 100px;">
                                <h5 class="mt-4">{{ $assurance->title }}</h5>
                                <hr class="w-25 mx-auto bg-primary mb-1">
                                <hr class="w-50 mx-auto bg-primary mt-0">
                                <p class="mb-0">{{ $assurance->description }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a type="button" data-bs-toggle="modal"
                                        data-bs-target="#consultationModal{{ $assurance->id }}">
                                        <span class="btn btn-sm btn-primary px-3 border-end"
                                            style="border-radius: 30px 0 0 30px;">Apply</span>
                                        <span class="btn btn-sm btn-primary px-3"
                                            style="border-radius: 0 30px 30px 0;">Maintenant</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Start -->
                        <div class="modal fade" id="consultationModal{{ $assurance->id }}" tabindex="-1"
                            aria-labelledby="consultationModalLabel{{ $assurance->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="consultationModalLabel{{ $assurance->id }}">
                                            {{ $assurance->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="consultationForm{{ $assurance->id }}" method="POST"
                                            action="{{ route('save_assuarance_formulaire') }}">
                                            @csrf

                                            <input type="hidden" name="assurance_id" value="{{ $assurance->id }}">
                                            <!-- Nom -->
                                            <div class="mb-3">
                                                <label for="nom" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="nom" name="nom"
                                                    placeholder="Enter Last Name">
                                            </div>

                                            <!-- Prenom -->
                                            <div class="mb-3">
                                                <label for="prenom" class="form-label">Prenom</label>
                                                <input type="text" class="form-control" id="prenom" name="prenom"
                                                    placeholder="Enter First Name">
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
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Assurances Section End -->

      
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
            $('#title').on('change', function() {
                var title = $('#title').val();

                // Construct the URL with query parameters for filtering
                var url = '{{ route('assuarance') }}' + '?title=' + encodeURIComponent(title);

                // Redirect to the constructed URL, which will reload the page with the filters applied
                window.location.href = url;
            });
        });

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
                                'Félicitations ! Vous serez contacté par un assistant dans les plus brefs délais.');
                            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                            successModal.show();
                            form[0].reset(); // Optional: reset form fields
                            form.closest('.modal').modal('hide'); // Hide the modal
                        },
                        error: function(xhr) {
                            console.error('Error:', xhr.responseText);
                            $('#errorModal .modal-body').text('Une erreur est survenue. Veuillez réessayer.');
                            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                            errorModal.show();
                        }
                    });
                });
            });
        </script>
        

</body>

</html>
