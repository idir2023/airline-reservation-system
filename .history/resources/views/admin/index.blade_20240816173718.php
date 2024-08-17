@extends('layouts.master')

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
  </div>
@endsection
