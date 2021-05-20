@extends('layouts.layout')

@section('title')
    Feliciano
@endsection

@section('description')
    Feliciano, Error page.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Error!', 'subtitle' => 'An error occured in the process.'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="heading-section ftco-animate mb-5 text-center">
                        <span class="subheading">Error!</span>
                        <h2 class="mb-4">An error has happened.</h2>
                    </div>
                </div>
                @if($errors->any())
                    <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
