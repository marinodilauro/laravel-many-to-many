@extends('layouts.admin')

@section('content')
  <header class="py-3 bg_dark text-white">
    <div class="custom_container d-flex align-items-center justify-content-between">

      <h1>Editing type: {{ $technology->name }}</h1>

      <a class="custom_btn btn_primary" href="{{ route('admin.technologies.index') }}">
        <i class="fa-solid fa-angle-left fa-sm"></i>
        Back to technologies
      </a>

    </div>
  </header>

  <div class="container py-5">

    @include('partials.validation-errors')
    @include('partials.action-confirmation')

    <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
          aria-describedby="nameHelper" placeholder="Python" value="{{ old('name', $technology->name) }}" />
        <small id="nameHelper" class="form-text text-muted">Edit the name og this technology</small>

        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <button type="submit" class="custom_btn btn_primary border-0">
        <i class="fa-regular fa-floppy-disk fa-sm"></i>
        Save
      </button>

    </form>
  </div>
@endsection
