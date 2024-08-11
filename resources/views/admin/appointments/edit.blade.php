@extends('layouts.master')

@section('title')
    @lang('Edit Rendez-vous')
@endsection

@section('css')
    <!-- Add any additional CSS specific to this page if needed -->
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Rendez-vous')
        @endslot
        @slot('li_2')
            {{ route('appointments.index') }}
        @endslot
        @slot('title')
            @lang('Edit Rendez-vous')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">@lang('Date')</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $appointment->date)}}" required>
                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="titre" class="form-label">@lang('Title')</label>
                                    <input type="text" class="form-control @error('titre') is-invalid @enderror" id="title" name="title" value="{{ old('titre', $appointment->title) }}" required>
                                    @error('titre')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">@lang('Description')</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $appointment->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success waves-effect waves-light">@lang('Save')</button>
                            <a href="{{ route('appointments.index') }}" class="btn btn-secondary waves-effect waves-light">@lang('Cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
