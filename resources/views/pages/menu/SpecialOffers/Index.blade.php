@extends('layouts.app')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Special Offers</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('special_offers.index') }}">Special Offers</a></li>
                        <li class="breadcrumb-item active">All Offers</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right mx-2" role="group">
                <a class="btn btn-info box-shadow-2 px-2" href="{{ route('special_offers.create') }}" role="button">
                    <i class="fa-solid fa-plus"></i> Add Special Offer
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
                            <h4 class="card-title">Special Offers List</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered file-export w-100">
                                    <thead>
                                        <tr>
                                            <th>Discount</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($specialOffers as $offer)
                                            <tr>
                                                <td>{{ $offer->discount }}%</td>
                                                <td>{{ \Carbon\Carbon::parse($offer->start_date)->format('d M, Y h:i A') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($offer->end_date)->format('d M, Y h:i A') }}</td>
                                                <td>
                                                    <a href="{{ route('special_offers.edit', $offer->id) }}" class="icons warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>                                                    
                                                    <!-- Delete Button -->
                                                    <button type="button" class="icons danger" onclick="confirmDelete({{ $offer->id }})" style="border: none; background: transparent; padding: 0;">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>                                                    
                                                    <!-- Hidden Form for Deletion -->
                                                    <form id="delete-form-{{ $offer->id }}" action="{{ route('special_offers.destroy', $offer->id) }}" method="POST" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Discount</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="pagination-wrapper">
                                    {{ $specialOffers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Confirm delete action with SweetAlert2
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
                    // Submit the form to delete the special offer
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

@endsection
