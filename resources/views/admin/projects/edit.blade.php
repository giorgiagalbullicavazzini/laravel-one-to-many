@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">Modifica progetto: {{ $project->title }}</h2>

        @include('partials.errors')

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="form-input-image">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}">
            </div>
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" role="switch" id="set_image" name="set_image" value="1" @if($project->image) checked @endif>
                <label for="set_image" class="form-check-label">Attiva per gestire l'immagine</label>
            </div>
            <div class="mb-3 @if(!$project->image) d-none @endif" id="image-input-container">
                <div class="image-preview">
                    <img id="file-image-preview" @if($project->image) src="{{ asset('storage/' . $project->image) }}" @endif>
                </div>

                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection