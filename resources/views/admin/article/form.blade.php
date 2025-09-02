@extends('admin.article.layout')

@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ $model->id ? route('admin.articles.update', $model) : route('admin.articles.store') }}">
            @csrf
            @if($model->id)
                @method('PUT')
            @endif

            <div class="card h-100 mb-3">
                <div class="card-header">
                    {{ __('Web pages') }}
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <input type="hidden" id="parent_id" name="parent_id" value="{{ $model->parent_id ?? '' }}">
                        <input type="hidden" id="lang" name="lang" value="{{ $model->lang ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="page" class="form-label">{{ __('Page') }}</label>
                        <select class="form-select select2 @error('web_pages') is-invalid @enderror" id="web_pages" name="web_pages[]" multiple>
                            @foreach(\App\Models\WebPage::all() as $page)
                                <option value="{{ $page->id }}" {{ $model->webPages->contains($page) ? 'selected' : '' }}>{{ $page->title }}</option>
                            @endforeach
                        </select>

                        @error('web_pages')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                       value="{{ $model->title ?? '' }}"
                                       data-seo-title data-seo-slug
                                >

                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="slug" class="form-label">{{ __('Slug') }}</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           id="slug" name="slug" value="{{ optional($model->seo)->slug }}"
                                    >

                                    @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                  name="description" data-seo-description maxlength="250"
                        >{{ $model->description ?? '' }}</textarea>

                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label">{{ __('Text') }}</label>
                        <textarea class="form-control ckeditor @error('text') is-invalid @enderror" id="text" name="text"
                        >{{ $model->text ?? '' }}</textarea>

                        @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 text-end">
                        {{--                        <label for="status" class="form-label">{{ __('Status') }}</label>--}}
                        <div class="btn-group" role="group">
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


            <div class="text-end">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
@endsection
