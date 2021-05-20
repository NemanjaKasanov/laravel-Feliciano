@extends('layouts.layout')

@section('title')
    Feliciano
@endsection

@section('description')
    Feliciano, a simple way of ordering high quality food.
@endsection

@section('keywords')
    Feliciano,restaurant,food
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Our Menu', 'subtitle' => 'Create your order, fast and easy.'])

    <section class="ftco-section">
        <div class="container">
            <div class="ftco-search">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap mb-5 border-bottom">
                        <form action="#" method="POST" class="col-12 d-flex justify-content-center">
                            <div class="col-lg-6 col-sm-12 col-12">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search within selected category..."/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="search_btn" id="search_btn" class="btn btn-primary py-3 px-5 col-12" value="Search"/>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 nav-link-wrap">
                        <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach($categories as $el)
                                <a class="nav-link ftco-animate category @if($el->name == 'Breakfast') active @endif" id="{{ $el->id }}" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">{{ $el->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 tab-wrap d-flex flex-wrap" id="productsDisplay">
                        @foreach($breakfast as $el)
                            <div class="col-md-4 ftco-animate">
                                <div class="blog-entry">
                                    <a href="{{ route('dish', ['product' => $el->id]) }}" class="block-20" style="background-image: url({{ asset('assets/img/'.$el->image) }});"></a>
                                    <div class="text pt-3 pb-4 px-4">
                                        <h3 class="heading"><a href="{{ route('dish', ['product' => $el->id]) }}">{{ $el->name }}</a></h3>
                                        <p>{{ $el->description }}</p>
                                        <p>
                                            @foreach($el->ingredients as $ing)
                                                @if($loop->last)
                                                    <span>{{ $ing->name }}</span>
                                                @else
                                                    <span>{{ $ing->name }}, </span>
                                                @endif
                                            @endforeach
                                        </p>
                                        <p>Time to make: <span class="font-weight-bold">{{ $el->time_to_make }} min.</span></p>
                                        <div class="col-12 d-flex">
                                            <p><a href="{{ route('dish', ['product' => $el->id]) }}" class="btn btn-primary">Add to order</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
