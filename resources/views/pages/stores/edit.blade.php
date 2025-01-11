@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Store</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('stores.update', $store->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $store->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required>{{ $store->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            @if ($store->logo)
                <img src="{{ asset('storage/' . $store->logo) }}" alt="Logo" width="50"><br>
            @endif
            <input type="file" id="logo" name="logo" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@endsection
