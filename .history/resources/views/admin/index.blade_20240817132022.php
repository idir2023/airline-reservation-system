@extends('layouts.master')

@section('title')
  @lang('sidebar.dashboard')
@endsection

@section('css')
  <!-- Lightbox css -->
  <link href="{{ URL::asset('/assets/libs/magnific-popup/magnific-popup.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Chart.js css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1') Dashboards @endslot
    @slot('title') Dashboard @endslot
  @endcomponent

  <!-- Stats Row 1 -->
  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <!-- Visas Card -->
        <div class="col-md-4">
          <div class="c                            <i class="bx bx-credit-card"></i>
">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">Visas</p>
                  <h4 class="mb-0">{{ $count_visa }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class='bx bxs-world font-size-24'></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Assurances Card -->
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
                      <i class="bx bx-shield-alt-2 font-size-24"></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Consultation Card -->
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('Consultation')</p>
                  <h4 class="mb-0">{{ $count_consultation }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-message-square-detail font-size-24"></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Stats Row 2 -->
  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <!-- Reviews Card -->
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('Reviews')</p>
                  <h4 class="mb-0">{{ $count_review }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bxs-comment-detail font-size-24"></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Actualite Card -->
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('Actualite')</p>
                  <h4 class="mb-0">{{ $count_actualite }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-news font-size-24"></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Card -->
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('Contact')</p>
                  <h4 class="mb-0">{{ $count_contact }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-phone font-size-24"></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Client Consultation Card -->
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('ClientConsultation')</p>
                  <h4 class="mb-0">{{ $count_formConsultation }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-user-check font-size-24"></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Assurance Form Card -->
        <div class="col-md-4">
          <div class="card mini-stats-wid">
            <div class="card-body">
              <div class="d-flex">
                <div class="flex-grow-1">
                  <p class="text-muted fw-medium">@lang('AssuranceForm')</p>
                  <h4 class="mb-0">{{ $count_formAssurance }}</h4>
                </div>
                <div class="align-self-center flex-shrink-0">
                  <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                    <span class="avatar-title rounded-circle bg-primary">
                      <i class="bx bx-file font-size-24"></i> <!-- Changed Icon -->
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Section -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Dashboard Charts</h4>
          <canvas id="dashboardChart" style="height: 300px;"></canvas>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
  <!-- Chart.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
  <script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const dashboardChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Visas', 'Assurances', 'Consultations', 'Reviews', 'Actualite', 'Contact', 'ClientConsultation', 'AssuranceForm'],
        datasets: [{
          label: 'Count',
          data: [{{ $count_visa }}, {{ $count_assurance }}, {{ $count_consultation }}, {{ $count_review }}, {{ $count_actualite }}, {{ $count_contact }}, {{ $count_formConsultation }}, {{ $count_formAssurance }}],
          backgroundColor: [
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
            'rgba(75, 192, 192, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
