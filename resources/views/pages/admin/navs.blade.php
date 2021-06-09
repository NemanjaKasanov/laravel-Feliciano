@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Navigation Elements:</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Route</th>
                                    <th>Position</th>
                                    <th>LogIn Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($table as $el)
                                    <tr>
                                        <th>{{ $el->id }}</th>
                                        <th>{{ $el->name }}</th>
                                        <th>{{ $el->href }}</th>
                                        <th>{{ $el->position }}</th>
                                        <th>{{ $el->login_status }}</th>
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
                        <h4 class="card-title">Update Navigation Element Position:</h4>
                        <div class="pt-2">
                            <form class="col-12" action="{{ route('admin_navs_update') }}" method="POST">
                                <div class="form-group">
                                    <label for="nav_id">Navigation Element Id</label>
                                    <select class="form-control" id="nav_id" name="nav_id">
                                        @foreach($table as $el)
                                            <option value="{{ $el->id }}">{{ $el->id }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="position">New Position Value</label>
                                    <select class="form-control" id="position" name="position">
                                        @for($i = 0; $i <= 99; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
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
