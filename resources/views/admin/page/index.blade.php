@extends('admin.page.layout')

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
                <td>
                    <span class=" w-75 badge rounded-pill content-status-{{ $item->status }}">
                        {{ __($item->status) }}
                    </span>
                </td>
                <td class="text-end">
                    <a href="#" class="text-warning"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="text-danger"><i class="fa fa-trash-can"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
