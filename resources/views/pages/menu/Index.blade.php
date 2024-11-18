@extends('layouts.app')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">My Menu</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Menus</a></li>
                        <li class="breadcrumb-item active"><a href="#">Menu</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right mx-2" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info box-shadow-2 px-2" href="{{ route('menus.create') }}" role="button">
                    <i class="fa-solid fa-plus"></i>
                    Add
                </a>                
            </div>
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info box-shadow-2 px-2" href="{{ route('special_offers.index') }}" role="button">
                    <i class="fa-solid fa-tags"></i>
                    Special Offers
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
                            <h4 class="card-title">Menu Form</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered file-export w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr>
                                                <td>{{ $menu->name }}</td>
                                                <td>{{ $menu->description }}</td>
                                                <td>
                                                    <a href="{{ route('menus.edit', $menu->id) }}" class="icons warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>                                                    
                                                    <!-- Delete Button -->
                                                    <button type="button" class="icons danger" onclick="confirmDelete()" style="border: none; background: transparent; padding: 0;">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>                                                    

                                                    <!-- Hidden Form for Deletion -->
                                                    <form id="delete-form" action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <!-- SweetAlert2 Script -->
                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                    <script>
                                                        function confirmDelete() {
                                                            Swal.fire({
                                                                title: 'Are you sure?',
                                                                text: 'You won\'t be able to revert this!',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Yes, delete it!',
                                                                cancelButtonText: 'Cancel',
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    // Submit the form to delete the menu
                                                                    document.getElementById('delete-form').submit();
                                                                }
                                                            });
                                                        }
                                                    </script>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="pagination-wrapper">
                                    {{ $menus->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
