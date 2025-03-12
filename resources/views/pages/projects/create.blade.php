@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Create Project</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            
            <form action="/projects/masterp" method="POST">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="project_code" class="form-label">Project Code</label>
                            <input type="text" name="project_code" id="project_code" class="form-control @error("project_code") is-invalid @enderror" value="{{ old('project_code') }}">
                            @error('project_code')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status_id" class="form-label">Status</label>
                            <select name="status_id" id="status_id" class="form-control @error("status_id") is-invalid @enderror" value="{{ old('status_id')}}">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                                @error('status_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="material" class="form-label">Material</label>
                            <input type="text" name="material" id="material" class="form-control @error("material") is-invalid @enderror" value="{{ old('material')}}">
                            @error('material')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="project_description" class="form-label">Project Description</label>
                            <input type="text" name="project_description" id="project_description" class="form-control @error("project_description") is-invalid @enderror" value="{{ old('project_description')}}">
                            @error('project_description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error("start_date") is-invalid @enderror" value="{{ old('start_date')}}">
                            @error('start_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="finish_date" class="form-label">Finish Date</label>
                            <input type="date" name="finish_date" id="finish_date" class="form-control @error("finish_date") is-invalid @enderror" value="{{ old('finish_date')}}">
                            @error('finish_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="qty" class="form-label">Qty</label>
                            <input type="text" name="qty" id="qty" class="form-control @error("qty") is-invalid @enderror" value="{{ old('qty')}}">
                            @error('qty')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/projects" class="btn btn-sm btn-outline-secondary mr-2">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection