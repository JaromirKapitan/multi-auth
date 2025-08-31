@extends('admin.web-page.layout')

@section('content')

    <div class="container-fluid web-map-container">
        <h1>MAP</h1>

        <div class="row">
            <div class="col-6">
                List
                <ul class="list-group" id="web_pages">
                    @foreach($webPages as $webPage)
                        @include('admin.web-page.map-item')
                    @endforeach
                </ul>
            </div>
            <div class="col-6">
                MENU <button id="save-menu" data-url="{{ route('admin.web-pages.map.store') }}">SAVE</button>
                <div id="menu">
                    <ul class="list-group">
                        @if($webMenus->isNotEmpty())
                            @foreach($webMenus as $webMenu)
                                @include('admin.web-page.map-item', ['webMenu' => $webMenu, 'webPage' => $webMenu->webPage])
                            @endforeach
                        @else
                            <li class="list-group-item item-add text-center bg-warning-subtle">
                                <i class="fa fa-plus"></i>
                            </li>
                        @endif
                    </ul>
                </div>

                <div id="empty-list" class="d-none">
                    <ul class="list-group">
                        <li class="list-group-item item-add text-center bg-warning-subtle">
                            <i class="fa fa-plus"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    @vite(['resources/js/admin/web_menu.js'])
@endpush
