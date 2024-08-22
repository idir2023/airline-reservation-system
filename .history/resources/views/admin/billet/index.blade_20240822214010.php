@extends('layouts.master')

@section('title')
    Réservation de Billet
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Réservation de Billet
        @endslot
        @slot('title')
            Liste des Réservations de Billet
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-4" id="action_btns">
                        <!-- Boutons d'actions pour filtrer, exporter, etc. -->
                    </div>

                    <table id="datatable" class="table-hover table-bordered nowrap w-100 table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Fichier PDF</th>
                                <th>Actions</th>
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
                language: {
                    search: "Rechercher",
                    lengthMenu: "Afficher _MENU_ éléments",
                    processing: "Traitement en cours...",
                    info: "Affichage de _START_ à _END_ sur _TOTAL_ éléments",
                    emptyTable: "Aucune donnée disponible",
                    paginate: {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": "Suivant",
                        "previous": "Précédent"
                    },
                },
                ajax: "{{ route('billet.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nom', name: 'nom' },
                    { data: 'prenom', name: 'prenom' },
                    { data: 'tele', name: 'tele' },
                    { data: 'email', name: 'email' },
                    {
                        data: 'pdf_path',
                        name: 'pdf_path',
                        render: function(data, type, full, meta) {
                            return `<a href="${data}" target="_blank">Télécharger PDF</a>`;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            // Init des boutons d'actions
            new $.fn.dataTable.Buttons(table, {
                buttons: [{
                    extend: 'colvis',
                    text: "Colonnes visibles"
                }]
            });

            // Ajouter les boutons au conteneur
            table.buttons().container()
                .prependTo($('#action_btns'));

            // Personnalisation des éléments
            $('.dataTables_length select').addClass('form-select form-select-sm');
            $('.dataTables_info, .dataTables_paginate').addClass('mt-3');
        });
    </script>
@endsection
