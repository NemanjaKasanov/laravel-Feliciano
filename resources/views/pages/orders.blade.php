@extends('layouts.layout')

@section('title')
    Feliciano
@endsection

@section('description')
    Feliciano, Pending Orders.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery,orders
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Pending Orders:', 'subtitle' => 'Manage orders here'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="col-12">

                        <div class="col-12 d-flex flex-wrap border-bottom pb-5">
                            <div class="lg-col-6 sm-col-12">
                                <p class="h3">Nemanja Kasanov</p>
                                <p>Address: Asagje AGk eg aejdg</p>
                                <p>Municipality: Vozdovac</p>
                                <p>City: Belgrade</p>
                                <p>Phone: 3154875219</p>
                                <p>At: time</p>
                                <p class="h2">Price: 12.99&euro;</p>
                                <form action="#" method="POST" class="pt-4">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" name="submit">Ship Order</button>
                                    <button type="submit" class="btn btn-danger" name="delete">Refuse Order</button>
                                </form>
                            </div>
                            <div class="lg-col-6 sm-col-12 d-flex flex-wrap">
                                <div class="col-lg-6 col-sm-12">
                                    <p class="h3">Product Name</p>
                                    <ul>
                                        <li>Mustard</li>
                                        <li>Chilly Sauce</li>
                                        <li>Something</li>
                                    </ul>
                                    <p></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
