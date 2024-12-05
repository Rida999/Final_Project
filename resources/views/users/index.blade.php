@extends('layouts.app')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">List Users</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">Users</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="content-body">
        <section id="file-export">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Users List</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered file-export">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}" class="icons warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <!-- Delete Button -->
                                                    <button type="button" class="icons danger" onclick="confirmDelete({{ $user->id }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                    <!-- Hidden Form for Deletion -->
                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <!-- SweetAlert2 Script -->
                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                    <script>
                                                        function confirmDelete(id) {
                                                            Swal.fire({
                                                                title: 'Are you sure?',
                                                                text: 'You won\'t be able to revert this!',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Yes, delete it!',
                                                                cancelButtonText: 'Cancel',
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Submit the form to delete the user
                                                                    document.getElementById('delete-form-' + id).submit();
                                                                }
                                                            });
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
