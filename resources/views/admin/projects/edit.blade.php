@extends('layouts.admin')

@section('page-header')
    <h1>Edit project: {{ $project->title }}</h1>
    <a href="{{ route('admin.projects.index') }}" role="button" class="btn btn-primary btn-sm">Go Back to Projects</a>
@endsection

@section('content')
    <div class="container mt-5">
        @include('partials.errors')

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Project Title</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $project->title) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Project Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                    name="description">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="project_image" class="form-label fw-bold">Project Image</label>
                <input class="form-control" type="file" id="project_image" name="project_image" value="{{ old('project_image', $project->project_image) }}">
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
