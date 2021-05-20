@extends('layouts.layout')

@section('title')
    Feliciano Log In Form
@endsection

@section('description')
    Feliciano, Log In to order online.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Log In', 'subtitle' => 'to an existing account to order online.'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            @if(!session()->has('user'))
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                    <div class="heading-section ftco-animate mb-5 text-center">
                        <span class="subheading">Feliciano</span>
                        <h2 class="mb-4">Log In Form</h2>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Your Email"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group text-center">
                                    <input type="submit" name="submit" value="Log In" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </div>
                    </form>
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
            @else
            <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                <div class="heading-section ftco-animate mb-5 text-center">
                    <span class="subheading">Oops!</span>
                    <h2 class="mb-4">You are already logged in.</h2>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection
