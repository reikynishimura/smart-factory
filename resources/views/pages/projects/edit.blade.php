@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Edit Project</h2>
        <form action="/projects/{{ $project->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_code">Project Code</label>
                <input type="text" name="project_code" class="form-control" value="{{ $project->project_code }}">
            </div>

            <div class="form-group">
                <label for="status_id">Status</label>
                <select name="status_id" class="form-control">
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}" {{ $project->status_id == $status->id ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" name="material" class="form-control" value="{{ $project->material }}">
            </div>

            <div class="form-group">
                <label for="project_description">Project Description</label>
                <input type="text" name="project_description" class="form-control" value="{{ $project->project_description }}">
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ $project->start_date }}">
            </div>

            <div class="form-group">
                <label for="finish_date">Finish Date</label>
                <input type="date" name="finish_date" class="form-control" value="{{ $project->finish_date }}">
            </div>

            <div class="form-group">
                <label for="qty">Qty</label>
                <input type="text" name="qty" class="form-control" value="{{ $project->qty }}">
            </div>

            <button type="submit" class="btn btn-warning">Save Changes</button>
            <a href="/projects" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
