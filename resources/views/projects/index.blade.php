@extends('layout')

@section('title', 'All Projects')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">All Projects</h2>

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Add New Project</a>

    @if ($projects->isEmpty())
        <div class="alert alert-info">No projects found.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($projects as $project)
                <div class="col">
                    <div class="card-body p-2">
                        @if ($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}" class="card-img-top" alt="Project Image">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{ $project->title }}</h5>
                                <p class="card-text">{{ $project->description }}</p>
                                @if ($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank" class="btn btn-outline-primary mb-2">Visit Project</a>
                                @endif
                                <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
                            </div>

                            <div class="d-flex justify-content-between mt-3">
                                <!-- Edit Button -->
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection