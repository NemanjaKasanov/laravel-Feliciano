@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Comments:</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product Id</th>
                                    <th>User Id</th>
                                    <th>Content</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($table as $el)
                                    <tr>
                                        <th>{{ $el->id }}</th>
                                        <th>{{ $el->product }}</th>
                                        <th>{{ $el->user }}</th>
                                        <th>{{ $el->content }}</th>
                                        <th>
                                            <form action="{{ route('admin_comments_delete') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="comment_id" value="{{ $el->id }}"/>
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
        </div>
    </div>

@endsection
