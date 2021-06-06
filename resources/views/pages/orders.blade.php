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
                        @if(count($orders) != 0)
                            @foreach($orders as $order)
                                <div class="col-12 d-flex flex-wrap border-bottom pb-5 mb-5">
                                    <div class="col-lg-6 col-sm-12 border-right">
                                        <p class="h3 mb-4">User Data:</p>
                                        <p class="h4 border-top">{{ $order->order_user->name }} {{ $order->order_user->last_name }}</p>
                                        <p>Address: <b>{{ $order->order_user->address }}</b></p>
                                        <p>Municipality: <b>{{ $order->order_user->municipality }}</b></p>
                                        <p>Email: <b>{{ $order->order_user->email }}</b></p>
                                        <p>Phone: <b>{{ $order->order_user->phone }}</b></p>
                                        <p>At: {{ $order->time }}</p>
                                        <form action="{{ route('shipOrRefuse') }}" method="POST" class="pt-4">
                                            @csrf
                                            <input type="hidden" name="order" value="{{ $order->id }}"/>
                                            <button type="submit" class="btn btn-primary" name="submit" value="1">Ship Order</button>
                                            <button type="submit" class="btn btn-danger" name="submit" value="2">Refuse Order</button>
                                        </form>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 d-flex flex-wrap">
                                        <div class="col-12">
                                            <p class="h3 mb-4">Order Products:</p>
                                        </div>
                                        <div class="col-12">
                                        @foreach($products as $product)
                                            @if($order->id == $product->order)
                                                <div class="col-12 mb-4">
                                                    <p class="h4 border-top">{{ $product->product_data->name }}</p>
                                                    @if(count($product->extras) != 0)
                                                        <p><b>Extras:</b></p>
                                                        <ul class="d-flex flex-wrap">
                                                            @foreach($product->extras as $extra)
                                                                <li class="col-lg-6 col-sm-12">{{ $extra->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                    <p><b>Quantity:</b> {{ $product->price_data->quantity }}</p>
                                                    <p><b>Price:</b> {{ $product->price_data->price }}&euro;</p>
                                                </div>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 d-flex flex-wrap border-bottom pb-5 mb-5">
                                <p class="h2">There are no orders at the moment.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
