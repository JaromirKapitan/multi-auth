@extends('layouts.admin')

@section('content')
    <table class="table table-hover border-1">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __('title') }}</th>
            <th>{{ __('status') }}</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($list as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->status }}

{{--                    {!! \App\Enums\ContentStatus::badge($item->status) !!}--}}

                    <span class="badge rounded-pill text-bg-secondary">Secondary</span>
                </td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
