@extends('layouts.app')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Edit Menu</h3>
        </div>
    </div>

    <div class="content-body">
        <section id="form-section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Menu Form</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <!-- Display validation errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Edit form -->
                                <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-body">
                                        <div class="row">
                                            <!-- Name -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name" 
                                                           value="{{ old('name', $menu->name) }}" required>
                                                </div>
                                            </div>
                                            
                                            <!-- Image -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                    @if ($menu->image)
                                                        <small class="form-text text-muted">Current Image: {{ $menu->image }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <!-- Description -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description" name="description">{{ old('description', $menu->description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Form Actions -->
                                    <div class="form-actions">
                                        <a href="{{ route('menus.index') }}" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Update
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

@endsection
