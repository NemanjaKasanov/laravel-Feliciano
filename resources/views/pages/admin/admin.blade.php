@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{ $user->name }}</h3>
                    <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="{{ asset('assets/admin/images/dashboard/people.svg') }}" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal">{{ $active_orders }}</h2>
                            </div>
                            <div class="ml-2">
                                <h4 class="location font-weight-normal">Active Orders</h4>
                                <h6 class="font-weight-normal">Right Now</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Orders</p>
                            <p class="fs-30 mb-2">{{ $all_orders }}</p>
                            <p>Active and Inactive Orders Total</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Inactive Orders</p>
                            <p class="fs-30 mb-2">{{ $inactive_orders }}</p>
                            <p>Shipped Orders Total</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Products in Carts</p>
                            <p class="fs-30 mb-2">{{ $in_carts }}</p>
                            <p>All Items in User Carts Currently</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Number of Users</p>
                            <p class="fs-30 mb-2">{{ $all_users }}</p>
                            <p>Total Registered Accounts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Latest Registered Users</p>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th class="pl-0  pb-2 border-bottom">Name</th>
                                <th class="border-bottom pb-2">Id</th>
                                <th class="border-bottom pb-2">Municipality</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($newest_users as $user)
                                    <tr>
                                        <td class="pl-0">{{ $user->name }} {{ $user->last_name }}</td>
                                        <td><p class="mb-0"><span class="font-weight-bold mr-2">{{ $user->id }}</span></p></td>
                                        <td class="text-muted">{{ $user->municipality }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Categories By Popularity</p>
                    <ul class="icon-data-list">
                        @foreach($categories_popularity as $el)
                            <li class="mb-4">
                                <div class="d-flex">
                                    <div>
                                        <p class="text-info mb-1 h5">Category: {{ $el->name }}</p>
                                        <p class="mb-0">Total Number of Products Bought: {{ $el->products->count() }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="row">
                <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                    <div class="card data-icon-card-primary">
                        <div class="card-body">
                            <p class="card-title text-white">Current Orders Value</p>
                            <div class="row">
                                <div class="col-8 text-white">
                                    <h3>{{ $current_orders_value }}&euro;</h3>
                                    <p class="text-white font-weight-500 mb-0">The total sum of all currently active orders price.</p>
                                </div>
                                <div class="col-4 background-icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- content-wrapper ends -->

@endsection
