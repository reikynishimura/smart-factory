@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-md-6">
            <h3 class="page-title">Project</h3>
            <h4 class="subtitle">Management Project</h4>
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
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                    <button class="btn btn-light border" data-toggle="modal" data-target="#createProjectModal"><i class="fas fa-plus"></i> Create</button>
                        <a href="{{ route('projects.exportExcel') }}" class="btn btn-light border">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        <a href="{{ route('projects.exportPdf') }}" class="btn btn-light border">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                        <a href="{{ url()->current() }}" class="btn btn-light border"><i class="fas fa-sync-alt"></i> Reload</a>
                    </div>
                    <div class="ms-auto">
                        <input type="text" id="search" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Project Code</th>
                            <th>Status</th>
                            <th>Material</th>
                            <th>Project Description</th>
                            <th>Start Date</th>
                            <th>Finish Date</th>
                            <th>Qty</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->project_code }}</td>
                        <td>{{ $project->status->name }}</td>
                        <td>{{ $project->material }}</td>
                        <td>{{ $project->project_description }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->finish_date }}</td>
                        <td>{{ $project->qty }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-primary btn-sm fas fa-eye mr-1" data-toggle="modal" data-target="#viewProjectModal{{ $project->id }}"></button>
                                <button class="btn btn-warning btn-sm fas fa-edit mr-1" data-toggle="modal" data-target="#editProjectModal{{ $project->id }}"></button>
                                <form action="/projects/{{ $project->id }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm fas fa-trash" onclick="confirmDelete(this)"></button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal tanpa AJAX -->
                    <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/projects/{{ $project->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="project_code">Project Code</label>
                                            <input type="text" name="project_code" id="project_code" class="form-control" value="{{ $project->project_code }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status_id">Status</label>
                                            <select name="status_id" id="status_id" class="form-control">
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}" {{ $project->status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="material">Material</label>
                                            <input type="text" name="material" id="material" class="form-control" value="{{ $project->material }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="project_description">Project Description</label>
                                            <input type="text" name="project_description" id="project_description" class="form-control" value="{{ $project->project_description }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $project->start_date }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="finish_date">Finish Date</label>
                                            <input type="date" name="finish_date" id="finish_date" class="form-control" value="{{ $project->finish_date }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="qty">Qty</label>
                                            <input type="text" name="qty" id="qty" class="form-control" value="{{ $project->qty }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-warning">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="editProjectContent">
                <!-- Form edit akan dimuat di sini melalui AJAX -->
            </div>
        </div>
    </div>

    <!-- Modal create tanpa AJAX -->
    <div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/projects/masterp" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="project_code">Project Code</label>
                            <input type="text" name="project_code" id="project_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status_id">Status</label>
                            <select name="status_id" id="status_id" class="form-control">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="material">Material</label>
                            <input type="text" name="material" id="material" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="project_description">Project Description</label>
                            <input type="text" name="project_description" id="project_description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="finish_date">Finish Date</label>
                            <input type="date" name="finish_date" id="finish_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="text" name="qty" id="qty" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @foreach ($projects as $project)
        <!-- Modal View Project -->
        <div class="modal fade" id="viewProjectModal{{ $project->id }}" tabindex="-1" aria-labelledby="viewProjectModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Project Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Project Code</th>
                                <td>{{ $project->project_code }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $project->status->name }}</td>
                            </tr>
                            <tr>
                                <th>Material</th>
                                <td>{{ $project->material }}</td>
                            </tr>
                            <tr>
                                <th>Project Description</th>
                                <td>{{ $project->project_description }}</td>
                            </tr>
                            <tr>
                                <th>Start Date</th>
                                <td>{{ $project->start_date }}</td>
                            </tr>
                            <tr>
                                <th>Finish Date</th>
                                <td>{{ $project->finish_date }}</td>
                            </tr>
                            <tr>
                                <th>Qty</th>
                                <td>{{ $project->qty }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection

@section('scripts')
    <script>
        $(document).on('click', '.edit-project', function() {
        let projectId = $(this).data('id');

        console.log("Project ID:", projectId); 

        $.ajax({
            url: '/projects/' + projectId + '/edit',
            type: 'GET',
            success: function(response) {
                console.log("Response sukses:", response); 

                $('#editProjectContent').html(response);
                
                $('#editProjectModal').modal('show'); 
                $('#editProjectModal').removeAttr('aria-hidden'); 
                $('#editProjectModal').css('display', 'block'); 
            },
            error: function(xhr) {
                console.log("AJAX error:", xhr.responseText);
            }
        });
    });
    </script>

    <script>
        function confirmDelete(button) {
            let confirmation = confirm("Apakah Anda yakin ingin menghapus project ini?");
            if (confirmation) {
                button.closest('form').submit(); 
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>


@endsection
