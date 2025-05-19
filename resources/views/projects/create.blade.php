@extends('layout')

@section('title', 'All Projects')

@section('content')
<body>

    <div class="container form-container">
        <h2 class="form-title">Add New Project</h2>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description (Optional)</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>

            <!-- Project URL -->
            <div class="mb-3">
                <label for="project_url" class="form-label">Project URL (Optional)</label>
                <input type="url" class="form-control" id="project_url" name="project_url">
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Project Image <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Add Project</button>
        </form>
    </div>

@endsection