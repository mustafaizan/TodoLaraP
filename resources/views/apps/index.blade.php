@extends('apps.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>
                Laravel 10 CRUD Example from scratch
                <a class="btn btn-primary float-end" href="{{ route('apps.create') }}"> Create New app</a>
            </h2>
        </div>
        <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($apps as $app)
                <tr>
                    
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->price }}</td>
                    <td>{{ $app->description }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('apps.show',$app->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('apps.edit',$app->id) }}">Edit</a>
                        <form action="{{ route('apps.destroy',$app->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $apps->links() !!}

        </div>
    </div>

@endsection