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
        <a type="submit" class="btn btn-secondary btn-lg" href="/folder/create">Create New</a>
      </div>

      {{-- START OF MAIN TABLE --}}
      <table class="table">
        <thead class="thead-dark">
          <tr>
              <th scope="col">#</th>
              <th scope="col">Folder Name</th>
              <th scope="col">Description</th>
              <th scope="col"># Images</th>
              <th scope="col">Actions</th>
          </tr>
          @forelse($folders as $folder)
              <tr>
                  <td scope="col">{{ $loop->iteration }}</td>
                  <td scope="col"><b>{{ $folder->name }}<b></td>
                  <td scope="col" style="max-width: 550px;">{{ $folder->description }}</td>
                  <td scope="col" class="text-center">{{ $folder->images_count }}</td>
                  <td scope="col">
                    <div class="row d-flex justify-content-between">
                      <a type="button" class="btn btn-primary" href="/folder/{{ $folder->id }}"><i class="far fa-eye"></i></a>
                      <a type="button" class="btn btn-success" href="/folder/{{ $folder->id }}/edit"><i class="fas fa-edit"></i></a>
                      <form class="form-inline" action="{{ route('folder.destroy', $folder->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </div>
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
