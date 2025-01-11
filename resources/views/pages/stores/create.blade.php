@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create Store</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" id="logo" name="logo" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>

@endsection
