@extends('admin.layout')

@section('menu')
    <nav class="navbar navbar-expand-md sticky-top bg-info" data-bs-theme="info">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubLeft" aria-controls="offcanvasNavbarSubLeft" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#">{{ __('Pages') }}</a>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbarSubLeft" aria-labelledby="offcanvasNavbarSubLeftLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarSubLeftLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pages.create') }}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

{{--            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarSubRight" aria-controls="offcanvasNavbarSubRight" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarSubRight" aria-labelledby="offcanvasNavbarSubRightLabel">--}}
{{--                <div class="offcanvas-header">--}}
{{--                    <h5 class="offcanvas-title" id="offcanvasNavbarSubRightLabel">Offcanvas</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="offcanvas-body">--}}
{{--                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </nav>
@endsection
