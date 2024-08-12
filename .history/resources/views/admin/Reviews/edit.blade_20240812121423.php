@extends('layouts.master')

@section('title')
    Modifier une Review
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Reviews
        @endslot
        @slot('li_2')
            {{ route('reviews.index') }}
        @endslot
        @slot('title')
            Modifier une Review
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

                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="nomcomplet" class="col-sm-3 col-form-label">Nom Complet</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomcomplet" name="nomcomplet" value="{{ old('nomcomplet', $review->nomcomplet) }}" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="datededepot" class="col-sm-3 col-form-label">Date de Dépôt</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="datededepot" name="datededepot" value="{{ old('datededepot', $review->datededepot) }}" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="dateReponse" class="col-sm-3 col-form-label">Date de Réponse</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="dateReponse" name="dateReponse" value="{{ old('dateReponse', $review->dateReponse) }}">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="accordounon" class="col-sm-3 col-form-label">Accordé ou Non</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="accordounon" name="accordounon" required>
                                    <option value="1" {{ old('accordounon', $review->accordounon) == '1' ? 'selected' : '' }}>Accordé</option>
                                    <option value="0" {{ old('accordounon', $review->accordounon) == '0' ? 'selected' : '' }}>Non Accordé</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="description" name="description" required>{{ old('description', $review->description) }}</textarea>
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
