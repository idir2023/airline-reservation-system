@extends('layouts.master')

@section('title')
    @lang('view visa', ['resource' => __('visa')])
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('visas')
        @endslot
        @slot('li_2')
            {{ route('visas.index') }}
        @endslot
        @slot('title')
            @lang('view visa', ['resource' => __('visa')])
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

                    <div class="row mb-4">
                        <label for="type_visa" class="col-sm-3 col-form-label">@lang('type')</label>
                        <div class="col-sm-9">
                            <p>{{ $visa->type_visa }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="destination_visa" class="col-sm-3 col-form-label">@lang('destination')</label>
                        <div class="col-sm-9">
                            <p>{{ $visa->destination_visa }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="motif" class="col-sm-3 col-form-label">@lang('motif')</label>
                        <div class="col-sm-9">
                            <p>{{ $visa->motif }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="description" class="col-sm-3 col-form-label">@lang('description')</label>
                        <div class="col-sm-9">
                            <p>{{ $visa->description }}</p>
                        </div>
                    </div>

                    @if($visa->pdf_path)
                        <div class="mb-2">
                            <a href="{{ Storage::disk('public')->url($visa->pdf_path) }}" target="_blank" class="btn btn-sm btn-info">
                                @lang('view pdf')
                            </a>
                        </div>
                    @endif

                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <a href="{{ route('visas.edit', $visa->id) }}" class="btn btn-info">@lang('buttons.edit')</a>
                            <a href="{{ route('visas.index') }}" class="btn btn-secondary">@lang('back')</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
@endsection
