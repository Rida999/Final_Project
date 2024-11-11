@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Blank Form</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Blank</a></li>
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
                                <h4 class="card-title">Form</h4>
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

                                                <form action="" method="POST" class="floating-labels" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Name</label>
                                                                    <input type="text" class="form-control" name="name" placeholder="Enter your Name" value="{{old('name')}}" required>

                                                                </div>
                                                            </div>


                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Email</label>
                                                                    <input type="text" class="form-control" name="email" placeholder="Enter your Email" value="{{old('email')}}">
                                                                </div>
                                                            </div>


                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Telephone</label>
                                                                    <input type="text" class="form-control" name="telephone" placeholder="Enter your Phone Number" value="{{old('telephone')}}" required>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="form-actions">
                                                        <a href="{{route('list')}}">
                                                            <button type="button" class="btn btn-warning mr-1 button-cancel">
                                                                <i class="ft-x"></i>&nbsp;
                                                                Cancel
                                                            </button>
                                                        </a>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i>&nbsp;Save
                                                        </button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

