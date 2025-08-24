@extends('admin.page.layout')

@section('content')
    <div class="container-fluid">
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control" id="title" placeholder="">
        </div>

        <div class="mb-3">
            <label for="text_short" class="form-label">{{ __('Short text') }}</label>
            <textarea type="text" class="form-control" id="text_short" placeholder=""></textarea>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">{{ __('Text') }}</label>
            <textarea type="text" class="form-control" id="text" placeholder=""></textarea>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">{{ __('Status') }}</label>
{{--{{ dd($data) }}--}}
            <div class="btn-group w-100" role="group">
                @foreach(\App\Enums\ContentStatus::values() as $status)
                    <input type="radio" class="btn-check" name="status" id="status-{{ $status }}" autocomplete="off"
                           {{ $model->status == $status ? "checked='checked'" : "" }}
                    >
                    <label class="btn btn-outline-{{ \App\Enums\ContentStatus::cssClass($status) }}"
                           for="status-{{ $status }}">{{ __($status) }}</label>
                @endforeach

{{--                <input type="radio" class="btn-check" name="status" id="status-draft" autocomplete="off">--}}
{{--                <label class="btn btn-outline-danger" for="status-draft">{{ __('Draft') }}</label>--}}

{{--                <button type="button" class="btn btn-warning">{{ __('Draft') }}</button>--}}
{{--                <button type="button" class="btn btn-success">{{ __('Published') }}</button>--}}
{{--                <button type="button" class="btn btn-danger">{{ __('Archived') }}</button>--}}
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </div>
@endsection
