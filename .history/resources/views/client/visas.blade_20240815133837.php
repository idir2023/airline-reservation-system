<!DOCTYPE html>
<html lang="en">

@include('client.layout.head')

<style>
    
.visa-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 350px; /* Adjust as necessary */
}

.visa-item img {
    object-fit: cover;
    height: 200px; /* Adjust as necessary */
    width: 100%;
    border-radius: 8px;
}

.visa-item h5, .visa-item p {
    margin-bottom: 15px;
}

.visa-item a {
    margin-top: auto;
    align-self: start;
}

</style>

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
                        <h1 class="display-3 text-white animated slideInDown">Informations sur lesV isas</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Informations surles Visas
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Visa Information Display Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Informations sur les visas</h6>
                <h1 class="mb-5">Types de visas disponibles</h1>
            </div>
            
            

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="motif">Motif</label>
                    <select id="motif" class="form-select">
                        <option value="">Tous les motifs</option>
                        @foreach ($getvisas as $visa)
                            <option value="{{ $visa->motif }}" {{ request('motif') == $visa->motif ? 'selected' : '' }}>
                                {{ $visa->motif }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="lieu">Lieu</label>
                    <select id="lieu" class="form-select">
                        <option value="">Tous les lieux</option>
                        @foreach ($getvisas as $visa)
                            <option value="{{ $visa->lieu }}" {{ request('lieu') == $visa->lieu ? 'selected' : '' }}>
                                {{ $visa->lieu }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($visas as $visa)
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="visa-item card border rounded p-4 h-100">
                            @if ($visa->image)
                                <img class="img-fluid mb-3 rounded" src="{{ Storage::disk('public')->url($visa->image) }}" alt="{{ $visa->type_visa }}">
                            @endif
                            <h5 class="mb-3">{{ $visa->type_visa }}</h5>
                            <p>{{ $visa->motif }}</p>
                            <p>{{ $visa->lieu }}</p>
                            <p>{{ $visa->destination_visa }}</p>
                            <p>{{ $visa->description }}</p>
                            @if ($visa->pdf_path)
                                <a href="{{ Storage::disk('public')->url($visa->pdf_path) }}" class="btn btn-primary mt-auto" target="_blank">
                                    View PDF
                                </a>
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

    {{-- filtrag jquery --}}

    <script>
        $(document).ready(function() {
            $('#motif, #lieu').on('change', function() {
                var motif = $('#motif').val();
                var lieu = $('#lieu').val();
    
                // Construct the URL with query parameters for filtering
                var url = '{{ route('visa') }}' + '?motif=' + encodeURIComponent(motif) + '&lieu=' + encodeURIComponent(lieu);
                
                // Redirect to the constructed URL, which will reload the page with the filters applied
                window.location.href = url;
            });
        });
    </script>    

</body>

</html>
