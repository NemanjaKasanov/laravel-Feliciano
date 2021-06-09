@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Categories:</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($table as $el)
                                    <tr>
                                        <th>{{ $el->id }}</th>
                                        <th>{{ $el->name }}</th>
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
                        <h4 class="card-title">Update Link:</h4>
                        <div class="pt-2">
                            <form class="col-12" action="{{ route('admin_categories_update') }}" method="POST">
                                <div class="form-group">
                                    <label for="category_id">Category Id</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        @foreach($table as $el)
                                            <option value="{{ $el->id }}">{{ $el->id }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input class="form-control form-control-lg mb-3" type="text" name="name" placeholder="Enter new name here."/>

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
