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
    <section class="home-slider owl-carousel js-fullheight">
        @foreach($home_slider as $el)
            <div class="slider-item js-fullheight" style="background-image: url({{ asset('assets/img/' . $el->image) }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-12 col-sm-12 text-center ftco-animate">
                            <span class="subheading">Feliciano</span>
                            <h1 class="mb-4">{{ $el->content }}</h1>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured">
                        <div class="row">
                            @foreach($slider_dishes as $el)
                                <div class="col-md-3">
                                    <div class="featured-menus ftco-animate">
                                        <div class="menu-img img" style="background-image: url({{ asset('assets/img/'.$el->image) }});"></div>
                                        <div class="text text-center">
                                            <h3>{{ $el->title }}</h3>
                                            <p>{{ $el->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-wrap-about">
        <div class="container">
            <div class="row">
                <div class="col-md-7 d-flex">
                    <div class="img img-1 mr-md-2" style="background-image: url({{ asset('assets/img/about.jpg') }})"></div>
                    <div class="img img-2 ml-md-2" style="background-image: url({{ asset('assets/img/about-1.jpg') }})"></div>
                </div>
                <div class="col-md-5 wrap-about pt-5 pt-md-5 pb-md-3 ftco-animate">
                    <div class="heading-section mb-4 my-5 my-md-0">
                        <span class="subheading">About</span>
                        <h2 class="mb-4">Feliciano Restaurant</h2>
                    </div>
                    <p>Feliciano Restaurant is founded on the idea that in the atmosphere of modern, busy life, everyone should have an option to eat healthy and delicious food without cooking for hours.</p>
                    <p class="time">
                        <span>Mon - Fri <strong>9 AM - 11 PM</strong></span>
                        <span><a href="#">+ 1-978-123-4567</a></span>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter">
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-md-9">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="18">0</strong>
                                    <span>Years of Experienced</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="30">0</strong>
                                    <span>Dishes</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="20">0</strong>
                                    <span>Staff Members</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="3000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center text-md-left">
                    <p>Our cooks are aspiring to make cooking an art!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <span class="subheading">Services</span>
                    <h2 class="mb-4">What We Do</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                    <div class="media block-6 services d-block">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-meeting"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Cook Breakfast</h3>
                            <p>Our breakfast dishes are specially nutritive and delicious, great for people on the run who don't have time to make their own breakfast.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                    <div class="media block-6 services d-block">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-tray"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Make Best Lunches</h3>
                            <p>Our lunch dishes are appreciated everywhere. Families order them, business people for the office, fitness and sports practitioners and many others.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                    <div class="media block-6 services d-block">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-cake"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Event Preparation</h3>
                            <p>Events often need food, desert and drinks supplied, so we offer event packages for birthday parties, weddings etc...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <span class="subheading">Chef</span>
                    <h2 class="mb-4">Our Master Chef</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('assets/img/chef-1.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>John Smooth</h3>
                            <span class="position mb-2">Restaurant Owner</span>
                            <div class="faded">
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('assets/img/chef-2.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>Rebeca Welson</h3>
                            <span class="position mb-2">Head Chef</span>
                            <div class="faded">
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('assets/img/chef-3.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>Kharl Branyt</h3>
                            <span class="position mb-2">Chef</span>
                            <div class="faded">
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('assets/img/chef-4.jpg') }});"></div>
                        <div class="text pt-4">
                            <h3>Luke Simon</h3>
                            <span class="position mb-2">Chef</span>
                            <div class="faded">
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section img" style="background-image: url({{ asset('assets/img/bg_3.jpg') }})" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-7 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="heading-section ftco-animate mb-5 text-center">
                        <span class="subheading">Book a table</span>
                        <h2 class="mb-4">Make Reservation</h2>
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" id="book_date" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Time</label>
                                    <input type="text" class="form-control" id="book_time" placeholder="Time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Person</label>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Person</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group text-center">
                                    <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section img">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">of Happy Customers</h2>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4" style="background-image: url({{ asset('assets/img/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Jason McClean</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4" style="background-image: url({{ asset('assets/img/person_2.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Stevenson</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4" style="background-image: url({{ asset('assets/img/person_3.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Art Leonard</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4" style="background-image: url({{ asset('assets/img/person_4.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Rose Henderson</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
