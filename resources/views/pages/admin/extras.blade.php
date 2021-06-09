@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Extras:</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($table as $el)
                                    <tr>
                                        <th>{{ $el->id }}</th>
                                        <th>{{ $el->name }}</th>
                                        <th>
                                            <form action="{{ route('admin_extras_delete') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="extra_id" value="{{ $el->id }}"/>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </th>
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
                        <h4 class="card-title">Add Extra:</h4>
                        <div class="pt-2">
                            <form class="col-12" action="{{ route('admin_extras_update') }}" method="POST">
                                <input class="form-control form-control-lg mb-3" type="text" name="name" placeholder="Extra name..."/>
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
