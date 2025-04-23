@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="page-title">User</h3>
            <h4 class="subtitle">Management User</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User</li>
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
                        <button class="btn btn-light border" data-toggle="modal" data-target="#createUserModal"><i class="fas fa-plus"></i> Create</button>
                        <a href="{{ route('user.exportExcel') }}" class="btn btn-light border">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>
                        <a href="{{ route('user.exportPdf') }}" class="btn btn-light border">
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
                                <th>NIP</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Plant</th>
                                <th>ID Cards</th>
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->plant->name ?? '-' }}</td>
                                    <td>{{ $user->id_cards }}</td>
                                    <td>{{ $user->role->name ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-primary btn-sm fas fa-eye mr-1 " data-toggle="modal" data-target="#viewUserModal{{ $user->id }}"></button>
                                            <button class="btn btn-warning btn-sm fas fa-edit mr-1" data-toggle="modal" data-target="#editUserModal{{ $user->id }}"></button>
                                            <form action="/user/{{ $user->id }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm fas fa-trash" onclick="confirmDelete(this)"></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal tanpa AJAX -->
                                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="'-1" aria-labelledby="editUserLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/user/{{ $user->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="nip">NIP</label>
                                                        <input type="text" name="nip" id="nip" class="form-control" value="{{ $user->nip }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Isi jika ingin ganti password">
                                                    </div>  
                                                    <div class="form-group">
                                                        <label for="plant_id">Plant</label>
                                                        <select name="plant" id="plant_id" class="form-control">
                                                            @foreach ($plants as $plant)
                                                                <option value="{{ $plant->id }}" {{ $user->plant_id == $plant->id ? 'selected' : '' }}>
                                                                    {{ $plant->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="id_cards">ID Card</label>
                                                        <input type="text" name="id_cards" id="id_cards" class="form-control" value="{{ $user->id_cards }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="role_id">Role</label>
                                                        <select name="role" id="role_id" class="form-control">
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
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
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="editUserModal">
                <!-- Form edit akan dimuat di sini melalui AJAX -->
            </div>
        </div>
    </div>

    <!-- Modal create langsung dimasukkan tanpa AJAX -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/user/masteru" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Kata sandi" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="plant_id">Plant</label>
                            <select name="plant" id="plant_id" class="form-control">
                                @foreach ($plants as $plant)
                                    <option value="{{ $plant->id }}">{{ $plant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_cards">ID Card</label>
                            <input type="text" name="id_cards" id="id_cards" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select name="role" id="role_id" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
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

    @foreach ($users as $user)
        <!-- Modal View Project -->
        <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" aria-labelledby="viewUserModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>NIP</th>
                                <td>{{ $user->nip }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>{{ $user->password }}</td>
                            </tr>
                            <tr>
                                <th>Plant</th>
                                <td>{{ $user->plant->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>ID Card</th>
                                <td>{{ $user->id_cards }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{ $user->role->name ?? '-' }}</td>
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
