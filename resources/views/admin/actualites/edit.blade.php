@extends('layouts.master')

@section('title')
    Éditer une Actualité
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Actualités
        @endslot
        @slot('li_2')
            {{ route('actualites.index') }}
        @endslot
        @slot('title')
            Éditer une Actualité
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

                    <form action="{{ route('actualites.update', $actualite->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <label for="title" class="col-sm-3 col-form-label">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $actualite->title) }}" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="description" name="description" required>{{ old('description', $actualite->description) }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                @if ($actualite->image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::disk('public')->url($actualite->image) }}" alt="Image actuelle" style="width: 100px; height: auto;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
