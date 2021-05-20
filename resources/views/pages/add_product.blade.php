@extends('layouts.layout')

@section('title')
    Feliciano | Add Product
@endsection

@section('description')
    Add a product into the database.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Add Product', 'subtitle' => 'Form for adding a new product into the database.'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="heading-section ftco-animate mb-5 text-center">
                        <p class="mb-4 h2">Add a product into the database:</p>
                    </div>
                    <div class="col-12 border-top pt-5 d-flex justify-content-center">
                        <form action="{{ route('addProduct') }}" method="POST" class="col-lg-8 col-sm-12" enctype="multipart/form-data">
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
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label for="name">Product Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name"/>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="category">Product Category:</label>
                                        <select class="form-control" id="category"  name="category">
                                            @foreach($categories as $ctg)
                                                <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label for="description">Product Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" maxlength="255"></textarea>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label for="image">Product Image:</label>
                                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label for="time_to_make">Time to Make (in MINUTES):</label>
                                    <input type="text" class="form-control" id="time_to_make" name="time_to_make" placeholder="Time to Make">
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label>Product Ingredients:</label>
                                </div>
                                <div class="col-12 d-flex flex-wrap">
                                    @foreach($ingredients as $el)
                                        <div class="form-check col-lg-4 col-md-6">
                                            <input class="form-check-input" type="checkbox" value="{{ $el->id }}" id="ing-{{ $el->id }}" name="ingredients[]"/>
                                            <label class="form-check-label" for="ing-{{ $el->id }}">
                                                {{ $el->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="form-group">
                                    <label>Product Extras:</label>
                                </div>
                                <div class="col-12 d-flex flex-wrap">
                                    @foreach($extras as $el)
                                        <div class="form-check col-lg-4 col-md-6">
                                            <input class="form-check-input" type="checkbox" value="{{ $el->id }}" id="ext-{{ $el->id }}" name="extras[]"/>
                                            <label class="form-check-label" for="ext-{{ $el->id }}">
                                                {{ $el->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group text-center pt-3">
                                <input type="submit" value="Add Product" class="btn btn-primary py-3 px-5 col-12" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
