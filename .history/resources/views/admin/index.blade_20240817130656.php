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
                  <p class="text-muted fw-medium">@lang('Contact')</p>
                  <h4 class="mb-0">{{$count_contact}}</h4> 
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
        <div class="col-md-4">
            <div class="card mini-stats-wid">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">@lang('ClientConsultation')</p>
                    <h4 class="mb-0">{{ $count_formConsultation}}</h4> 
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
          <div class="col-md-4">
            <div class="card mini-stats-wid">
              <div class="card-body">
                <div class="d-flex">
                  <div class="flex-grow-1">
                    <p class="text-muted fw-medium">@lang('ClientConsultation')</p>
                    <h4 class="mb-0">{{ $count_formConsultation}}</h4> 
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
  


        $count_formAssurance = AssuranceFormulaire::count();
        $count_formConsultation
      </div>
      <!-- end row -->
    </div>
  </div>
  <!-- end row -->



@endsection
