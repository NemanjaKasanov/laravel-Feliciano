@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Users:</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($table as $el)
                                    <tr>
                                        <th>{{ $el->id }}</th>
                                        <th>{{ $el->name }} {{ $el->last_name }}</th>
                                        <th>{{ $el->email }}</th>
                                        <th>{{ $el->phone }}</th>
                                        <th>{{ $el->address }}</th>
                                        <th>{{ $el->role }}</th>
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
                    <h4 class="card-title">Update User Role:</h4>
                    <div class="pt-2">
                        <form class="col-12" action="{{ route('admin_accounts_update') }}" method="POST">
                            <div class="form-group">
                                <label for="user_id">User Id</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    @foreach($table as $el)
                                        <option value="{{ $el->id }}">{{ $el->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="role">New User Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="0">User</option>
                                    <option value="1">Employee</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>

                            @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
