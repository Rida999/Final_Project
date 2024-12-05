@extends('layouts.app')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">List Stores</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Stores</a></li>
                        <li class="breadcrumb-item active"><a href="#">List Stores</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info box-shadow-2 px-2" href="{{ route('stores.create') }}" role="button">
                    <i class="fa-solid fa-plus"></i>
                    Add Store
                </a>
            </div>
        </div>
    </div>
    
    <div class="content-body">
        <section id="file-export">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Stores</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered file-export">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Logo</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stores as $store)
                                            <tr>
                                                <td>{{ $store->id }}</td>
                                                <td>{{ $store->name }}</td>
                                                <td>{{ $store->description }}</td>
                                                <td>
                                                    @if ($store->logo)
                                                        <img src="{{ asset('storage/' . $store->logo) }}" alt="Logo" width="50">
                                                    @else
                                                        No Logo
                                                    @endif
                                                </td>
                                                <td>{{ $store->created_at->format('Y-m-d') }}</td> <!-- Displaying creation date -->
                                                <td>
                                                    <a href="{{ route('stores.edit', $store->id) }}" class="icons warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <!-- Delete Button -->
                                                    <button type="button" class="icons danger" onclick="confirmDelete({{ $store->id }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                    <!-- Hidden Form for Deletion -->
                                                    <form id="delete-form-{{ $store->id }}" action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display:none;">
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
                                                                    // Submit the form to delete the store
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
                                    {{ $stores->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
