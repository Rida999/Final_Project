@extends('layouts.app')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">List Reviews</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Reviews</a></li>
                        <li class="breadcrumb-item active"><a href="#">List Reviews</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-info box-shadow-2 px-2" href="{{ route('reviews.create') }}" role="button">
                    <i class="fa-solid fa-plus"></i>
                    Add Review
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
                            <h4 class="card-title">List Reviews</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered file-export">
                                    <thead>
                                        <tr>
                                            <th>Store</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->store->name ?? 'N/A' }}</td>
                                                <td>{{ $review->rating }} Stars</td>
                                                <td>{{ $review->review_text }}</td>
                                                <td>{{ $review->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('reviews.edit', $review->id) }}" class="icons warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <!-- Delete Button -->
                                                    <button type="button" class="icons danger" onclick="confirmDelete({{ $review->id }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>

                                                    <!-- Hidden Form for Deletion -->
                                                    <form id="delete-form-{{ $review->id }}" action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:none;">
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
                                                                    // Submit the form to delete the review
                                                                    document.getElementById('delete-form-' + id).submit();
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
                                            <th>Store</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="pagination-wrapper">
                                    {{ $reviews->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
