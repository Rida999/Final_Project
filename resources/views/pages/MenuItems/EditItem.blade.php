@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Edit Menu Item</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('menu_items.index') }}">Menu Items</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="form-section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Menu Item Form</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('menu_items.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <!-- Name -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $menuItem->name) }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Description -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $menuItem->description) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="price">Price</label>
                                                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $menuItem->price) }}" required>
                                                    </div>
                                                </div>

                                                <!-- Category -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $menuItem->category) }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Image -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="image">Image (optional)</label>
                                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                                        @if ($menuItem->image)
                                                            <small>Current Image: <a href="{{ asset('storage/' . $menuItem->image) }}" target="_blank">View</a></small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <a href="{{ route('menu_items.index') }}" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
