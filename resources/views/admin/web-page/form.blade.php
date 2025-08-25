@extends('admin.web-page.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ $model->id ? route('admin.web-pages.update', $model) : route('admin.web-pages.store') }}">
            @csrf
            @if($model->id)
                @method('PUT')
            @endif
            <div class="row mb-3 g-3">
                <div class="col-lg-9">
                    <div class="card h-100">
                        <div class="card-header">
                            {{ __('Article') }}
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                       value="{{ $model->title ?? '' }}"
                                       data-seo-title data-seo-slug
                                >

                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="text_short" class="form-label">{{ __('Short text') }}</label>
                                <textarea class="form-control @error('text_short') is-invalid @enderror" id="text_short"
                                          name="text_short" data-seo-description maxlength="250"
                                >{{ $model->text_short ?? '' }}</textarea>

                                @error('text_short')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="text" class="form-label">{{ __('Text') }}</label>
                                <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text"
                                >{{ $model->text_short ?? '' }}</textarea>

                                @error('text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">{{ __('Status') }}</label>
                                <div class="btn-group w-100" role="group">
                                    @foreach(\App\Enums\ContentStatus::values() as $status)
                                        <input type="radio" class="btn-check" name="status" id="status-{{ $status }}" autocomplete="off"
                                               {{ $model->status == $status ? "checked='checked'" : "" }} value="{{ $status }}"
                                        >
                                        <label class="btn btn-outline-{{ \App\Enums\ContentStatus::cssClass($status) }}"
                                               for="status-{{ $status }}">{{ __($status) }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('admin.seo-data.form')
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
@endsection
