@extends('classic-white::app')

@section('content')
    <main class="container-fluid px-0">
        <div class="row g-3">
            @foreach($cars as $car)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card rs-shadow">
                        <img src="{{ $car['image'] }}" class="card-img-top" alt="{{ $car['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car['title'] }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
