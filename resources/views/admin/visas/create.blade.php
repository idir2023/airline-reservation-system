@extends('layouts.master')

@section('title')
  @lang('add visa', ['resource' => __('visa')])
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
      @lang('add visa', ['resource' => __('visa')])
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
          <form class="needs-validation" novalidate action="{{ route('visas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-8">

                <div class="row mb-4">
                  <label for="type_visa" class="col-sm-3 col-form-label">@lang('type')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="type_visa" name="type_visa" value="{{ old('type_visa') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('type')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="image" class="col-sm-3 col-form-label">@lang('image')</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('image')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="lieu" class="col-sm-3 col-form-label">@lang('lieu')</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="lieu" name="lieu" value="{{ old('lieu') }}" required>
                      <div class="valid-feedback">
                          @lang('validation.good')
                      </div>
                      <div class="invalid-feedback">
                          @lang('validation.required', ['attribute' => __('lieu')])
                      </div>
                  </div>
              </div>
              

                <div class="row mb-4">
                  <label for="destination_visa" class="col-sm-3 col-form-label">@lang('destination')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="destination_visa" name="destination_visa" value="{{ old('destination_visa') }}" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('destination')])
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="motif" class="col-sm-3 col-form-label">@lang('motif')</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="motif" name="motif" value="{{ old('motif') }}" required>
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
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                  </div>
                </div>

                <div class="row mb-4">
                  <label for="pdf" class="col-sm-3 col-form-label">@lang('upload pdf')</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="pdf" name="pdf" required>
                    <div class="valid-feedback">
                      @lang('validation.good')
                    </div>
                    <div class="invalid-feedback">
                      @lang('validation.required', ['attribute' => __('upload_pdf')])
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-9">
                    <div>
                      <button class="btn btn-primary" type="submit">@lang('buttons.submit')</button>
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