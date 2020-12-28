@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}

            <div class="pb-4" style="display:flex;justify-content:space-between">
              <h2>Folders List</h2>
              <a type="submit" class="btn btn-primary btn-lg" href="/create">Create New</a>
            </div>

            {{-- START OF MAIN TABLE --}}
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Folder Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Number of Images</th>
                    <th scope="col">Action</th>
                </tr>
                @forelse($folders as $folder)
                    <tr>
                        <td scope="col">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $folder->name }}</td>
                        <td scope="col">{{ $folder->description }}</td>
                        <td scope="col">{{ $folder->images_count }}</td>
                        <td scope="col">
                            <a class="btn btn-primary" href="/folder/{{ $folder->id }}">View</a>
                            <a class="btn btn-warning" href="/edit">Edit</a>
                            <a class="btn btn-danger" href="/delete">Delete</a>
                            <!-- <button type="button" class="btn btn-outline-info">Update</button>
                            <button type="button" class="btn btn-outline-danger">Delete</button> -->
                        </td>
                    </tr>
                @empty
                    <td>
                        <p style="text-align: center">No data available</p>
                    </td>
                @endforelse
                
                </thead>
            </table>
            {{-- END OF MAIN TABLE --}}
        </div>
    </div>
</div>
@endsection
