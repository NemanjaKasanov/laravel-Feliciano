@extends('layouts.layout')

@section('title')
    Feliciano
@endsection

@section('description')
    Feliciano, Order Submitted Successfully.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Order Submitted!', 'subtitle' => ''])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="heading-section ftco-animate mb-5 text-center">
                        <span class="subheading">Thank You!</span>
                        <h2 class="mb-4">You have successfully submitted your order.</h2>
                    </div>
                    <div class="col-12 d-flex justify-content-center border-top">
                        <div class="col-lg-8 col-sm-12 text-center pt-5">
                            @include('partials.order_delivery_info')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
