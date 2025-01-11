@extends('layouts.app')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">Edit Order</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item active"><a href="#">Edit Order</a></li>
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
                            <h4 class="card-title">Edit Order</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- User Selection -->
                                    <div class="form-group">
                                        <label for="user_id">User</label>
                                        <select name="user_id" class="form-control" id="user_id" required>
                                            <option value="">Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Order Status Selection -->
                                    <div class="form-group">
                                        <label for="order_status_id">Order Status</label>
                                        <select name="order_status_id" class="form-control" id="order_status_id" required>
                                            <option value="">Select Order Status</option>
                                            @foreach ($orderStatuses as $status)
                                                <option value="{{ $status->id }}" {{ $order->order_status_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <!-- Payment Status Selection -->
                                    <div class="form-group">
                                        <label for="payment_status_id">Payment Status</label>
                                        <select name="payment_status_id" class="form-control" id="payment_status_id" required>
                                            <option value="">Select Payment Status</option>
                                            @foreach ($paymentStatuses as $status)
                                                <option value="{{ $status->id }}" {{ $order->payment_status_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <!-- Delivery Address Selection -->
                                    <div class="form-group">
                                        <label for="delivery_address_id">Delivery Address</label>
                                        <select name="delivery_address_id" class="form-control" id="delivery_address_id" required>
                                            <option value="">Select Delivery Address</option>
                                            @foreach ($addresses as $address)
                                                <option value="{{ $address->id }}" {{ $order->delivery_address_id == $address->id ? 'selected' : '' }}>
                                                    {{ $address->city->name ?? 'N/A' }} - {{ $address->street ?? 'N/A' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Total Amount -->
                                    <div class="form-group">
                                        <label for="total">Total Amount</label>
                                        <input type="number" name="total" class="form-control" id="total" value="{{ $order->total }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
