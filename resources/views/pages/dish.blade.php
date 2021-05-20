@extends('layouts.layout')

@section('title')
    Feliciano | {{ $product->name }}
@endsection

@section('description')
    {{ $product->name }} | {{ $product->description }}
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => "$product->name", 'subtitle' => "Product > " . $product->category_name->name . " > $product->name"])

    <section class="ftco-section">
        <div class="container">
            <div class="ftco-search">
                <div class="row d-flex flex-wrap">
                    <div class="col-lg-6 col-sm-12">
                        <p class="h1">{{ $product->name }}</p>
                        <p class="h3 border-bottom mb-3 pb-3">Category: {{ $product->category_name->name }}</p>
                        <p>{{ $product->description }}</p>
                        <p>
                            Ingredients:
                            @foreach($product->ingredients as $ing)
                                @if($loop->last)
                                    <span>{{ $ing->name }}</span>
                                @else
                                    <span>{{ $ing->name }}, </span>
                                @endif
                            @endforeach
                        </p>
                        <p>Time to make: <span class="font-weight-bold">{{ $product->time_to_make }} min.</span></p>
                        @if(session()->has('user'))
                            <div class="col-12 mb-3 pt-3 border-top">
                                <form action="#" method="POST" class="col-12">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}"/>
                                    @if(count($product->extras) != 0)
                                        <div class="col-12">
                                            <p class="label">Extras (FREE):</p>
                                        </div>
                                        <div class="col-12 d-flex flex-wrap mb-4">
                                            @foreach($product->extras as $el)
                                                <div class="form-check col-lg-4 col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="{{ $el->id }}" id="{{ $el->id }}" name="extras"/>
                                                    <label class="form-check-label" for="{{ $el->id }}">
                                                        {{ $el->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if(count($product->prices) != 0)
                                        <div class="form-group">
                                            <label for="size">Portion Size:</label>
                                            <div class="select-wrap one-third">
                                                <select name="size" id="size" class="form-control">
                                                    @foreach($product->prices as $el)
                                                        <option value="{{ $el->id }}">{{ $el->quantity }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <p class="h5 mt-2">Price: <span id="product_price">{{ $first_price->price }}</span>&euro;</p>
                                            </div>
                                        </div>
                                        <div class="col-12" id="itemAddedToCart">
                                            <p class="h4">Product Added to Order.</p>
                                        </div>
                                        <div class="form-group text-center pt-3">
                                            <input type="submit" value="Add to Order" class="btn btn-primary py-3 px-5 col-12 preventDefault" name="submit" id="submit_order_btn"/>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        @else
                            <div class="col-12 mb-3 pt-3 border-top">
                                <p class="h5"><a href="{{ route('login.form') }}">Log In</a> to Add to Order</p>
                            </div>
                        @endif
                        @if(session()->get('user')->role > 0)
                            <div class="col-12 mt-5 border-top">
                                <p class="h4 mt-5 mb-3">Add/Remove Size and Price:</p>
                                <div class="col-12 pb-5">
                                    <p class="h5">Remove Existing Price and Quantity:</p>
                                    <form action="{{ route('deletePrice') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="product" value="{{ $product->id }}"/>
                                        <ul class="list-group">
                                            @foreach($product->prices as $el)
                                                <li class="list-group-item">
                                                    <button type="submit" class="btn btn-danger" name="id" value="{{ $el->id }}">Delete</button> <i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{ $el->quantity }} | {{ $el->price }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </form>
                                </div>
                                <div class="col-12 border-top pt-5">
                                    <p class="h5">Add Price and Quantity:</p>
                                    <form class="col-12" action="{{ route('addPrice') }}" method="POST">
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
                                        @csrf
                                        <input type="hidden" name="product" value="{{ $product->id }}"/>
                                        <div class="form-group">
                                            <label for="quantity">Size/Quantity with measure unit:</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Size/Quantity"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price in EURO:</label>
                                            <input type="number" step="any" class="form-control" id="price" name="price" placeholder="Price"/>
                                        </div>
                                        <div class="form-group text-center pt-3">
                                            <input type="submit" value="Submit" class="btn btn-primary py-3 px-5 col-12" name="submit_price"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <div class="col-12">
                            @if(session()->get('user')->role > 0)
                                <form action="{{ route('deleteProduct', ['product' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $product->id }}" name="product"/>
                                    <p class="mb-5 h4 font-weight-bold p-4 bg-light d-flex justify-content-center">
                                        <a href="{{ route('changeProduct.form', ['product' => $product->id]) }}" class="">Change Product</a>
                                        <button type="submit" class="btn btn-danger ml-3">Delete Product</button>
                                    </p>
                                </form>
                            @endif
                            <a href="#" class="block-20 preventDefault" style="background-image: url({{ asset('assets/img/'.$product->image) }});"></a>
                        </div>
                        <div class="col-12 mb-5">
                            <form>
                                @csrf
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}"/>
                                <p class="mb-5 h4 font-weight-bold p-4 bg-light"><span id="likes_number">0</span> likes @if(session()->has('user'))| <a href="#" class="preventDefault" id="like">LIKE</a>@endif</p>
                            </form>
                            @if(session()->has('user'))
                                <div class="comment-form-wrap">
                                    <form action="{{ route('commentProduct') }}" method="POST" class="p-4 p-md-5 bg-light">
                                        @csrf
                                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}"/>
                                        <div class="form-group">
                                            <label for="comment">Post a Comment</label>
                                            <textarea name="comment" id="comment" name="comment" cols="30" rows="5" class="form-control" maxlength="300"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Comment" class="btn py-3 px-4 btn-primary preventDefault" id="submit_comment_btn" name="submit_comment_btn"/>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <p class="h3">Comments:</p>
                            @endif
                        </div>
                        <div class="col-12">
                            <ul class="comment-list" id="comments_display">
                                {{-- COMMENT SECTION --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
