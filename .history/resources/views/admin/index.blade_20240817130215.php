@extends('layouts.master')

@section('title')
  @lang('sidebar.dashboard')
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      Dashboards
    @endslot
    @slot('title')
      Dashboard
    @endslot
  @endcomponent

  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">Visas</p>
                  <h4 class="mb-0">{{$count_visa}}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class='bx bx-globe font-size-24'></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">Assurances</p>
                  <h4 class="mb-0">{{ $count_assurance }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bxs-paper-plane font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">@lang('Consultation')</p>
                    <h4 class="mb-0">{{$count_consultation}}</h4>
                  </div>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-buildings font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
  </div>
  <!-- end row -->

  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('Reviews')</p>
                  <h4 class="mb-0">{{$count_review}}</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bxs-plane-alt font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-4">
                  <div class="card mini-stats-wid">
                    <div class="card-body">
                      <div class="d-flex">
                        <div class="flex-grow-1">
                          <p class="text-muted fw-medium">@lang('Actualite')</p>
                          <h4 class="mb-0">{{$count_actualite}}</h4>
                        </div>
        
                        <div class="align-self-center flex-shrink-0">
                          <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                              <i class="bx bxs-plane-alt font-size-24"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('')')</p>
                  <h4 class="mb-0">8</h4>
                </div>

                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-user font-size-24"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
  </div>
  <!-- end row -->



  {{-- last 10 flights --}}
  {{-- <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">@lang('translation.dashboard.latest_flights')</h4>
          <div class="table-responsive">
            <table class="table-nowrap mb-0 table align-middle">
              <thead class="table-light">
                <tr>
                  <th class="align-middle">#</th>
                  <th class="align-middle">@lang('translation.flight.flight_number')</th>
                  <th class="align-middle">@lang('translation.flight.airline')</th>
                  <th class="align-middle">@lang('translation.flight.origin')</th>
                  <th class="align-middle">@lang('translation.flight.destination')</th>
                  <th class="align-middle">@lang('translation.flight.departure')</th>
                  <th class="align-middle">@lang('translation.flight.arrival')</th>
                  <th class="align-middle">@lang('translation.flight.price')</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data['lastFlights'] as $flight)
                  <tr>
                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{ $loop->iteration }}</a> </td>
                    <td class="text-info fw-bold">{{ ucfirst($flight->flight_number) }}</td>
                    <td>{{ ucfirst($flight->airline->name) }}</td>
                    <td><span class="badge badge-pill badge-soft-info font-size-13">{{ ucfirst($flight->origin->name) }}</span></td>
                    <td><span class="badge badge-pill badge-soft-success font-size-13">{{ ucfirst($flight->destination->name) }}</span></td>
                    <td>{{ formatDateWithTimezone($flight->departure) }}</td>
                    <td>{{ formatDateWithTimezone($flight->arrival) }}</td>
                    <td class="text-primary fw-bold">{{ formatPrice($flight->price) }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="10" class="text-center">@lang('translation.emptyTable')</td>
                  </tr>
                @endforelse

              </tbody>
            </table>
          </div>
          <!-- end table-responsive -->
        </div>
      </div>
    </div>
  </div> --}}
  <!-- end row -->
@endsection
