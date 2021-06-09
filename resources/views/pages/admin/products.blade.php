@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Products:</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Change</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($table as $el)
                                    <tr>
                                        <th>{{ $el->id }}</th>
                                        <th>{{ $el->name }}</th>
                                        <th><a href="{{ route('changeProduct.form', ['product' => $el->id]) }}">Change</a></th>
                                        <th><a href="{{ route('deleteProduct', ['product' => $el->id]) }}" class="text-danger">Delete</a></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Product:</h4>
                        <div class="pt-2">
                            <p>
                                <a href="{{ route('addProductForm') }}">Add a New Product</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
