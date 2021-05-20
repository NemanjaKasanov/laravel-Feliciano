@extends('layouts.layout')

@section('title')
    Feliciano Registration Form
@endsection

@section('description')
    Feliciano, Register to order online.
@endsection

@section('keywords')
    Feliciano,restaurant,food,order,online,delivery
@endsection

@section('content')
    @include('fixed.title', ['title' => 'Register', 'subtitle' => 'Register a new account'])

    @include('partials.register', ['image_exists' => 'no'])
@endsection
