@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

            <div class="pb-4">
              <h2>Edit New Folder</h2>
            </div>
            <div>
                <form>
                    <div class="form-group">
                        <label for="name">Folder Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="folderHelp" placeholder="Enter folder's name">
                        <small id="folderHelp" class="form-text text-muted">Describe your folder name.</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
