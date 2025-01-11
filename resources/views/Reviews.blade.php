@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Add Review</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Reviews</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="file-export">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add New Review</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="card-content collapse show">
                                        <div class="card-body">
                                            <form action="{{ route('reviews.store') }}" method="POST" class="floating-labels">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="store_id">Store</label>
                                                                <select class="form-control" name="store_id" required>
                                                                    <option value="">Select Store</option>
                                                                    @if(isset($stores))
                                                                        @foreach($stores as $store)
                                                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('store_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="rating">Rating</label>
                                                                <select class="form-control" name="rating" required>
                                                                    <option value="">Select Rating</option>
                                                                    <option value="1">1 Star</option>
                                                                    <option value="2">2 Stars</option>
                                                                    <option value="3">3 Stars</option>
                                                                    <option value="4">4 Stars</option>
                                                                    <option value="5">5 Stars</option>
                                                                </select>
                                                                @error('rating')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="review_text">Review</label>
                                                                <textarea class="form-control" name="review_text" rows="5" placeholder="Enter your review" required>{{ old('review_text') }}</textarea>
                                                                @error('review_text')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1 button-cancel" onclick="resetForm()">
                                                        <i class="ft-x"></i>&nbsp;Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i>&nbsp;Save
                                                    </button>
                                                </div>
                                            </form>

                                            <!-- @if(isset($reviews) && count($reviews) > 0)
                                                <div class="table-responsive mt-5">
                                                    <h4>Existing Reviews</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Store</th>
                                                                <th>Rating</th>
                                                                <th>Review</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($reviews as $review)
                                                                <tr>
                                                                    <td>{{ $review->store->name ?? 'N/A' }}</td>
                                                                    <td>{{ $review->rating }} Stars</td>
                                                                    <td>{{ $review->review_text }}</td>
                                                                    <td>{{ $review->created_at->format('Y-m-d') }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    {{ $reviews->links() }}
                                                </div>
                                            @endif
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        function resetForm() {
            document.querySelector('form').reset();  // Reset the form fields
        }
    </script>
@endsection
