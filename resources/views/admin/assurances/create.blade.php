@extends('layouts.master')

@section('title')
    Créer une Assurance
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Assurances
        @endslot
        @slot('li_2')
            {{ route('assurances.index') }}
        @endslot
        @slot('title')
            Créer une Assurance
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('assurances.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="title" class="col-sm-3 col-form-label">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
