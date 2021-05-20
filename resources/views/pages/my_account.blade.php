@extends('layouts.layout')

@section('title')
    Feliciano | {{ session()->get('user')->name }} {{ session()->get('user')->last_name }}
@endsection

@section('description')
    Feliciano, My Account Page | {{ session()->get('user')->name }} {{ session()->get('user')->last_name }}
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,account,Account
@endsection

@section('content')
    @include('fixed.title', ['title' => session()->get('user')->name.' '.session()->get('user')->last_name, 'subtitle' => 'View and Change Your Account Settings.'])

    <section class="ftco-section img" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5 d-flex flex-wrap">
                    <div class="col-lg-6 col-sm-12">
                        <div class="col-12">
                            <div class="about-author d-flex p-4 bg-light">
                                <div class="desc">
                                    <h3>Account Information:</h3>
                                    <p>Name: {{ $user->name }} {{ $user->last_name }}</p>
                                    <p>Email: {{ $user->email }}</p>
                                    <p>Phone number: {{ $user->phone }}</p>
                                    <p>Address: {{ $user->address }}</p>
                                    <p>Municipality: {{ $user->municipality }}</p>
                                    <p> Role:
                                        @if($user->role == 0) Customer / User
                                        @elseif($user->role == 1) Employee
                                        @else Admin
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <form action="{{ route('changeAccountInfo') }}" method="POST" class="col-12">
                            <p class="h4 mb-4">Change Information:</p>
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Your Phone" value="{{ $user->phone }}"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Your Address" value="{{ $user->address }}"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="municipality">Municipality</label>
                                    <input type="text" name="municipality" class="form-control" placeholder="Voždovac, Stari Grad, etc." value="{{ $user->municipality }}"/>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-group text-center">
                                    <input type="submit" name="submit" value="Register" class="btn btn-primary py-3 px-5 col-12">
                                </div>
                            </div>
                            @if($errors->any())
                                <div class="col-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
