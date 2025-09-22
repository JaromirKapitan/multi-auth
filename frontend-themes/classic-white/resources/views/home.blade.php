@extends('classic-white::app')

@section('content')
    <main class="container rounded mt-3 rs-shadow">
        <div class="row">

            @foreach($cars as $car)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="heading-bg">
                        <h2>{{ $car['title'] }}</h2>
                        <img class="img-fluid" src="{{ $car['image'] }}">

                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
