@extends('layouts.master')

@section('title')
    @lang('Modifier une Review')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Reviews')
        @endslot
        @slot('li_2')
            {{ route('reviews.index') }}
        @endslot
        @slot('title')
            @lang('Modifier une Review')
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
                        
                        <!-- Champ Nom Complet -->
                        <div class="row mb-4">
                            <label for="nomcomplet" class="col-sm-3 col-form-label">@lang('Nom Complet')</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nomcomplet" name="nomcomplet" value="{{ old('nomcomplet', $review->nomcomplet) }}" required>
                                <div class="valid-feedback">
                                    @lang('validation.good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('validation.required', ['attribute' => __('Nom Complet')])
                                </div>
                            </div>
                        </div>

                        <!-- Champ Lieu de Dépôt -->
                        <div class="row mb-4">
                            <label for="lieu_depot" class="col-sm-3 col-form-label">@lang('Lieu de Dépôt')</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="lieu_depot" name="lieu_depot_id" required>
                                    @foreach($lieuDepotOptions as $lieuDepot)
                                        <option value="{{ $lieuDepot->id }}" {{ old('lieu_depot_id', $review->lieu_depot_id) == $lieuDepot->id ? 'selected' : '' }}>
                                            {{ $lieuDepot->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback">
                                    @lang('validation.good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('validation.required', ['attribute' => __('Lieu de Dépôt')])
                                </div>
                            </div>
                        </div>

                        <!-- Champ Date de Dépôt -->
                        <div class="row mb-4">
                            <label for="datededepot" class="col-sm-3 col-form-label">@lang('Date de Dépôt')</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="datededepot" name="datededepot" value="{{ old('datededepot', $review->datededepot) }}" required>
                                <div class="valid-feedback">
                                    @lang('validation.good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('validation.required', ['attribute' => __('Date de Dépôt')])
                                </div>
                            </div>
                        </div>

                        <!-- Champ Date de Réponse -->
                        <div class="row mb-4">
                            <label for="dateReponse" class="col-sm-3 col-form-label">@lang('Date de Réponse')</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="dateReponse" name="dateReponse" value="{{ old('dateReponse', $review->dateReponse) }}">
                                <div class="valid-feedback">
                                    @lang('validation.good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('validation.optional', ['attribute' => __('Date de Réponse')])
                                </div>
                            </div>
                        </div>

                        <!-- Champ Accordé ou Non -->
                        <div class="row mb-4">
                            <label for="accordounon" class="col-sm-3 col-form-label">@lang('Accordé ou Non')</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="accordounon" name="accordounon" required>
                                    <option value="1" {{ old('accordounon', $review->accordounon) == '1' ? 'selected' : '' }}>@lang('Accordé')</option>
                                    <option value="0" {{ old('accordounon', $review->accordounon) == '0' ? 'selected' : '' }}>@lang('Non Accordé')</option>
                                </select>
                                <div class="valid-feedback">
                                    @lang('validation.good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('validation.required', ['attribute' => __('Accordé ou Non')])
                                </div>
                            </div>
                        </div>

                        <!-- Champ Description -->
                        <div class="row mb-4">
                            <label for="description" class="col-sm-3 col-form-label">@lang('Description')</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="description" name="description" required>{{ old('description', $review->description) }}</textarea>
                                <div class="valid-feedback">
                                    @lang('validation.good')
                                </div>
                                <div class="invalid-feedback">
                                    @lang('validation.required', ['attribute' => __('Description')])
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">@lang('Mettre à jour')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
