@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Review</h1>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Store Selection -->
    <div class="form-group">
        <label for="store_id">Store</label>
        <select name="store_id" id="store_id" class="form-control">
            @foreach ($stores as $store)
                <option value="{{ $store->id }}" {{ $store->id == $review->store_id ? 'selected' : '' }}>
                    {{ $store->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Rating Input -->
    <div class="form-group">
        <label for="rating">Rating (1 to 5)</label>
        <input type="number" name="rating" id="rating" class="form-control" value="{{ $review->rating }}" required min="1" max="5">
    </div>

    <!-- Review Text -->
    <div class="form-group">
        <label for="review_text">Review Text</label>
        <textarea name="review_text" id="review_text" class="form-control" required>{{ $review->review_text }}</textarea>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Review</button>
</form>

</div>
@endsection
