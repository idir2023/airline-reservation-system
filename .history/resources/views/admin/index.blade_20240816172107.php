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

  <!-- Display Visa Stats -->
  <div class="row">
    <div class="col-md-4">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Total Visas</p>
              <h4 class="mb-0">{{ $visas->count() }}</h4>
            </div>
            <div class="align-self-center flex-shrink-0">
              <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                <span class="avatar-title">
                  <i class='bx bx-globe font-size-24'></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Display Reviews Stats -->
    <div class="col-md-4">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Total Reviews</p>
              <h4 class="mb-0">{{ $reviews->count() }}</h4>
            </div>
            <div class="align-self-center flex-shrink-0">
              <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                <span class="avatar-title rounded-circle bg-primary">
                  <i class="bx bxs-comment-detail font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Display Actualités Stats -->
    <div class="col-md-4">
      <div class="card mini-stats-wid">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1">
              <p class="text-muted fw-medium">Total Actualités</p>
              <h4 class="mb-0">{{ $actualites->count() }}</h4>
            </div>
            <div class="align-self-center flex-shrink-0">
              <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                <span class="avatar-title rounded-circle bg-primary">
                  <i class="bx bx-news font-size-24"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- You can add more content here -->

@endsection
