@extends('layouts.layout')

@section('title')
    Feliciano
@endsection

@section('description')
    Feliciano, No access.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => 'No Access!', 'subtitle' => 'Sorry.'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="heading-section ftco-animate mb-5 text-center">
                        <span class="subheading">No Access!</span>
                        <h2 class="mb-4">You don't have a permission to access this page.</h2>
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
