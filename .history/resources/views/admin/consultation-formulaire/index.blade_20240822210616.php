@extends('layouts.master')

@section('title')
    Consultations
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Consultations 
        @endslot
        @slot('li_2')
            {{ route('consultation-formulaire.index') }}
        @endslot
        @slot('title')
            Liste des Consultations
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-4" id="action_btns">
                        
                    </div>

                    <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
                        <thead class="table-light">
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>@lang('title')</th>
                                <th>@lang('name')</th>
                                <th>@lang('prenom')</th>
                                <th>@lang('numerTele')</th>
                                <th>@lang('description')</th>
                                <th>@lang('actions')</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>

    {{-- datatable init --}}
    <script type="text/javascript">
        $(function() {
            let table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                lengthChange: true,
                lengthMenu: [10, 20, 50, 100],
                pageLength: 10,
                scrollX: true,
                order: [
                    [0, "desc"]
                ],
                // text translations
                language: {
                    search: "@lang('translation.search')",
                    lengthMenu: "@lang('translation.lengthMenu1') _MENU_ @lang('translation.lengthMenu2')",
                    processing: "@lang('translation.processing')",
                    info: "@lang('translation.infoShowing') _START_ @lang('translation.infoTo') _END_ @lang('translation.infoOf') _TOTAL_ @lang('translation.infoEntries')",
                    emptyTable: "@lang('translation.emptyTable')",
                    paginate: {
                        "first": "@lang('translation.paginateFirst')",
                        "last": "@lang('translation.paginateLast')",
                        "next": "@lang('translation.paginateNext')",
                        "previous": "@lang('translation.paginatePrevious')"
                    },
                },
                ajax: "{{ route('consultation-formulaire.index') }}",
                columns: [
                    { data: 'id' },
                    { data: 'title' },
                    { data: 'nom' },
                    { data: 'prenom' },
                    { data: 'numerTele' },
                    { data: 'description' },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            // init buttons
            new $.fn.dataTable.Buttons(table, {
                buttons: [{
                    extend: 'colvis',
                    text: "@lang('translation.colvisBtn')"
                }]
            });

            // add buttons to action_btns
            table.buttons().container()
                .prependTo($('#action_btns'));

            // select dropdown for change the page length
            $('.dataTables_length select').addClass('form-select form-select-sm');

            // add margin top to the pagination and info 
            $('.dataTables_info, .dataTables_paginate').addClass('mt-3');
        });
    </script>
@endsection
