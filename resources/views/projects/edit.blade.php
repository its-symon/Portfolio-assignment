@extends('layout')

@section('title', 'Edit Project')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Edit Project</h2>

    <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="p-4 bg-white rounded shadow-sm">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description (Optional)</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $project->description) }}</textarea>
        </div>

        <!-- Project URL -->
        <div class="mb-3">
            <label for="project_url" class="form-label">Project URL (Optional)</label>
            <input type="url" class="form-control" id="project_url" name="project_url" value="{{ old('project_url', $project->project_url) }}">
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">

            @if ($project->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="Current Image" width="150" class="img-thumbnail">
                    <p class="text-muted mt-1">Current image</p>
                </div>
            @endif
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="draft" {{ $project->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $project->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success">Update Project</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

@endsection