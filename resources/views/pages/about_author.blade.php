@extends('layouts.layout')

@section('title')
    About Author
@endsection

@section('description')
    Feliciano, About Author.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Nemanja Kašanov', 'subtitle' => 'About author page'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-6 col-sm-12">
                        <div class="col-12 text-center">
                            <img class="img-fluid col-lg-8 col-sm-12" src="{{ asset('assets/img/about_author.jpg') }}"/>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <h3>About me:</h3>
                            <p>My name is Nemanja Kašanov (79/18). I am a final year student at the College for Information and Communication Technologies (ICT), studying Web Programming as a part of the Internet Technologies study program in Belgrade, Serbia.</p>
                            <p>My passion is creating applications and solving problems using programming languages and technologies I learned, and I strive to obtain more knowledge and master the skills I already have.</p>
                            <p>I am fluent in written and spoken English.</p>
                            <p>Currently working at EXTREMUM.</p>
                            <a href="{{ asset('assets/documentation.pdf') }}" target="_blank">DOCUMENTATION</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
