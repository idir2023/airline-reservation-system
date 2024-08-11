@extends('layouts.master')

@section('title')
    @lang('edit visa', ['resource' => __('visa')])
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('visa')
        @endslot
        @slot('li_2')
            {{ route('visas.index') }}
        @endslot
        @slot('title')
            @lang('edit visa', ['resource' => __('visa')])
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
                    <form class="needs-validation" novalidate action="{{ route('visas.update', $visa->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">

                                <div class="row mb-4">
                                    <label for="type_visa" class="col-sm-3 col-form-label">@lang('type_visa')</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="type_visa" name="type_visa"
                                            value="{{ old('type_visa', $visa->type_visa) }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('type_visa')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="destination_visa" class="col-sm-3 col-form-label">@lang('destination_visa')</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="destination_visa"
                                            name="destination_visa"
                                            value="{{ old('destination_visa', $visa->destination_visa) }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('destination_visa')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="motif" class="col-sm-3 col-form-label">@lang('motif')</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="motif" name="motif"
                                            value="{{ old('motif', $visa->motif) }}" required>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('motif')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="description" class="col-sm-3 col-form-label">@lang('description')</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" name="description" required>{{ old('description', $visa->description) }}</textarea>
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('description')])
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="pdf" class="col-sm-3 col-form-label">@lang('pdf')</label>
                                    <div class="col-sm-9">
                                        <!-- Display the old PDF if it exists -->
                                        @if ($visa->pdf_path)
                                            <div class="mb-2">
                                                <a href="{{ Storage::disk('public')->url($visa->pdf_path) }}"
                                                    target="_blank" class="btn btn-sm btn-info">
                                                    @lang('view pdf')
                                                </a>
                                            </div>
                                        @endif

                                        <!-- Input field to upload a new PDF -->
                                        <input type="file" class="form-control" id="pdf" name="pdf">
                                        <div class="valid-feedback">
                                            @lang('validation.good')
                                        </div>
                                        <div class="invalid-feedback">
                                            @lang('validation.required', ['attribute' => __('pdf')])
                                        </div>
                                    </div>
                                </div>


                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button class="btn btn-primary" type="submit">@lang('buttons.update')</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
