@extends('layouts.layout')

@section('title')
    Feliciano | Your Order
@endsection

@section('description')
    Feliciano, Products in your cart/order currently.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,order
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Your Order:', 'subtitle' => 'Preview and submit your final order.'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate p-2 px-md-5 pb-md-5">
                    <div class="col-md-12 tab-wrap d-flex flex-wrap border-bottom">
                        @if(count($cart_products) > 0)
                            @foreach($cart_products as $el)
                                <div class="col-md-4 ftco-animate">
                                    <div class="blog-entry">
                                        <a href="{{ route('dish', ['product' => $el->productObj->id]) }}" class="block-20" style="background-image: url({{ asset('assets/img/'.$el->productObj->image) }});"></a>
                                        <div class="text pt-3 pb-4 px-4">
                                            <h3 class="heading"><a href="{{ route('dish', ['product' => $el->productObj->id]) }}">{{ $el->productObj->name }}</a></h3>
                                            @if(!empty($el->extras))
                                                <p>With:
                                                    @foreach($el->extras as $extra)
                                                        @if($loop->last)
                                                            <span>{{ $extra->name }}</span>
                                                        @else
                                                            <span>{{ $extra->name }}, </span>
                                                        @endif
                                                    @endforeach
                                                </p>
                                            @endif
                                            <p>Size: <span class="font-weight-bold">{{ $el->priceObj->quantity }}</span></p>
                                            <p>Price: <span class="font-weight-bold">{{ $el->priceObj->price }}&euro;</span></p>
                                            <div class="col-12 d-flex">
                                                <form action="{{ route('deleteSelectedOrder') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $el->id }}"/>
                                                    <button type="submit" name="submit" class="btn btn-danger">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <p class="h2">Your Order Cart Is Empty.</p>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 pt-5 d-flex flex-wrap">
                        <div class="col-lg-6 col-sm-12">
                            <p class="h3 mb-4">Total Price: <span class="font-weight-bold">{{ $total }}&euro;</span></p>
                            <form action="#" method="POST">
                                @if(count($cart_products) > 0)
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Submit Order" class="btn btn-primary py-3 px-5">
                                    </div>
                                @else
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="Submit Order" class="btn btn-primary py-3 px-5 preventDefault">
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p>Your order will be processed and dispached as soon as it is ready (based on the "time to make" of each meal) and will arrive on your door within 30 minutes after that.</p>
                            <p>Payment is given to the delivery man.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
