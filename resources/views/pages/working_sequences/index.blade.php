@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="page-title">Working Sequence</h3>
            <h4 class="subtitle">Management Working Sequence</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Working Sequences</li>
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
                        <button class="btn btn-light border" data-toggle="modal" data-target="#createWorkingSequenceModal"><i class="fas fa-plus"></i> Create</button>
                        <a href="{{ route('working_sequences.exportExcel') }}" class="btn btn-light border">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        <a href="{{ route('working_sequences.exportPdf') }}" class="btn btn-light border">
                            <i class="fas fa-file-pdf"></i> Export PDF
                        </a>
                        <a href="{{ url()->current() }}" class="btn btn-light border"><i class="fas fa-sync-alt"></i> Reload</a>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="text" id="search" class="form-control" placeholder="Search...">
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Working Sequence Code</th>
                                <th>Person Required</th>
                                <th>Multi WI</th>
                                <th>Process Code</th>
                                <th>Process Name</th>
                                <th>Work Center Code</th>
                                <th>Work Center Name</th> 
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workingSequences as $sequence)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sequence->working_sequence_code }}</td>
                                    <td>{{ $sequence->person_required ?? '-' }}</td>
                                    <td>{{ $sequence->multiwi->name }}</td>
                                    <td>{{ $sequence->process_code }}</td>
                                    <td>{{ $sequence->process_name }}</td>
                                    <td>{{ $sequence->work_center_code }}</td>
                                    <td>{{ $sequence->work_center_name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-primary btn-sm fas fa-eye mr-1 " data-toggle="modal" data-target="#viewWorkingSequenceModal{{ $sequence->id }}"></button>
                                            <button class="btn btn-warning btn-sm fas fa-edit mr-1" data-toggle="modal" data-target="#editWorkingSequenceModal{{ $sequence->id }}"></button>
                                            <form action="/working_sequences/{{ $sequence->id }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm fas fa-trash" onclick="confirmDelete(this)"></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal tanpa AJAX -->
                                <div class="modal fade" id="editWorkingSequenceModal{{ $sequence->id }}" tabindex="'-1" aria-labelledby="editWorkingSequenceLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Working Sequence</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/working_sequences/{{ $sequence->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="working_sequence_code">Working Sequence Code</label>
                                                        <input type="text" name="working_sequence_code" id="working_sequence_code" class="form-control" value="{{ $sequence->working_sequence_code }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="person_required">Person Required</label>
                                                        <input type="text" name="person_required" id="person_required" class="form-control" value="{{ $sequence->person_required }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="multiwi_id">Multi WI</label>
                                                        <select name="multiwi_id" id="multiwi_id" class="form-control">
                                                            @foreach ($multiwis as $multiwi)
                                                                <option value="{{ $multiwi->id }}" {{ $sequence->multiwi_id == $multiwi->id ? 'selected' : '' }}>
                                                                    {{ $multiwi->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="process_code">Process Code</label>
                                                        <input type="text" name="process_code" id="process_code" class="form-control" value="{{ $sequence->process_code }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="process_name">Process Name</label>
                                                        <input type="text" name="process_name" id="process_name" class="form-control" value="{{ $sequence->process_name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="work_center_code">Work Center Code</label>
                                                        <input type="text" name="work_center_code" id="work_center_code" class="form-control" value="{{ $sequence->work_center_code }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="work_center_name">Work Center Name</label>
                                                        <input type="text" name="work_center_name" id="work_center_name" class="form-control" value="{{ $sequence->work_center_name }}" required>
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
    <div class="modal fade" id="editWorkingSequenceModal" tabindex="-1" aria-labelledby="editWorkingSequenceModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="editWorkingSequenceModal">
                <!-- Form edit akan dimuat di sini melalui AJAX -->
            </div>
        </div>
    </div>

    <!-- Modal create langsung dimasukkan tanpa AJAX -->
    <div class="modal fade" id="createWorkingSequenceModal" tabindex="-1" aria-labelledby="createWorkingSequenceModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Working Sequence</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/working_sequences/masterwi" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="working_sequence_code">Working Sequence Code</label>
                            <input type="text" name="working_sequence_code" id="working_sequence_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="person_required">Person Required</label>
                            <input type="text" name="person_required" id="person_required" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="multiwi_id">Multi WI</label>
                            <select name="multiwi_id" id="multiwi_id" class="form-control">
                                @foreach ($multiwis as $multiwi)
                                    <option value="{{ $multiwi->id }}">{{ $multiwi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="process_code">Process Code</label>
                            <input type="text" name="process_code" id="process_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="process_name">Process Name</label>
                            <input type="text" name="process_name" id="process_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="work_center_code">Work Center Code</label>
                            <input type="text" name="work_center_code" id="work_center_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="work_center_name">Work Center Name</label>
                            <input type="text" name="work_center_name" id="work_center_name" class="form-control" required>
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

    @foreach ($workingSequences as $sequence)
        <!-- Modal View Project -->
        <div class="modal fade" id="viewWorkingSequenceModal{{ $sequence->id }}" tabindex="-1" aria-labelledby="viewWorkingSequenceModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Working Sequence Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Working Sequence Code</th>
                                <td>{{ $sequence->working_sequence_code }}</td>
                            </tr>
                            <tr>
                                <th>Person Required</th>
                                <td>{{ $sequence->person_required }}</td>
                            </tr>
                            <tr>
                                <th>Multi WI</th>
                                <td>{{ $sequence->multiwi->name }}</td>
                            </tr>
                            <tr>
                                <th>Process Code</th>
                                <td>{{ $sequence->process_code }}</td>
                            </tr>
                            <tr>
                                <th>Process Name</th>
                                <td>{{ $sequence->process_name }}</td>
                            </tr>
                            <tr>
                                <th>Working Center Code</th>
                                <td>{{ $sequence->work_center_code }}</td>
                            </tr>
                            <tr>
                                <th>Working Center Name</th>
                                <td>{{ $sequence->work_center_name }}</td>
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
        function confirmDelete(button) {
            let confirmation = confirm("Apakah Anda yakin ingin menghapus Working Sequence ini?");
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
