@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">Modifica tipologia: {{ $type->name }}</h2>

        @include('partials.errors')

        <form action="{{ route('admin.types.update', $type) }}" method="POST" enctype="multipart/form-data" class="form-input-image">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection