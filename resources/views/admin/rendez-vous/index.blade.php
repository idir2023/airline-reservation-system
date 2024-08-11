@extends('layouts.master')

@section('title')
  @lang('rendez-vous')
@endsection

@section('css')
  <!-- DataTables -->
  <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  @component('components.breadcrumb')
    @slot('li_1')
      @lang('rendez-vous')
    @endslot
    {{-- @slot('li_2')
      {{ route('rendez-vous.index') }}
    @endslot --}}
    @slot('title')
      @lang('translation.resource_list', ['resource' => __('attributes.plane')])
    @endslot
  @endcomponent


  
  <!-- end row -->


@endsection
@section('script')
  <!-- Required datatable js -->
  <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

@endsection
