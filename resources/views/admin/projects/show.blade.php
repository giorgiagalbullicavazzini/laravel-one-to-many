@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ $project->title }}
        </h2>
        <h3>Type: 
            @if ($project->type) <a href="{{ route('admin.types.show', $project->type) }}"> {{ $project->type->name }}</a> 
            @else Nessuna tipologia 
            @endif 
        </h3>

        <div class="project-image @if(!$project->image) d-none @endif">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        </div>

        <p>{{ $project->description }}</p>
        <hr>
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>

    </div>
@endsection