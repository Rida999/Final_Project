@extends('layouts.app')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">List Orders</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                        <li class="breadcrumb-item active"><a href="#">List Orders</a></li>
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
                            <h4 class="card-title">List Orders</h4>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered file-export">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr id="order-row-{{ $order->id }}">
                                                <td>{{ $order->user->name ?? 'N/A' }}</td>
                                                <td>${{ number_format($order->total, 2) }}</td>
                                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <!-- Other Actions -->
                                                    <a href="{{ route('orders.edit', $order->id) }}" class="icons warning">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <button type="button" class="icons danger" onclick="confirmDelete({{ $order->id }})">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                    <!-- View Details Button -->
                                                    <!-- <button class="btn btn-sm btn-info" onclick="toggleDetails({{ $order->id }}, '{{ $order->order_status->description ?? 'N/A' }}', '{{ $order->payment_status->description ?? 'N/A' }}', '{{ $order->delivery_address->street ?? 'N/A' }}')">
                                                        <i id="toggle-icon-{{ $order->id }}" class="fa-solid fa-eye"></i>
                                                    </button> -->
                                                    <button class="btn btn-sm btn-info" onclick="toggleDetails({{ $order->id }}, '{{ $order->order_status->description ?? 'N/A' }}', '{{ $order->payment_status->description ?? 'N/A' }}', '{{ 'City: ' . ($order->delivery_address->city->name ?? 'N/A') . ' / ' . 'Street: ' . ($order->delivery_address->street ?? 'N/A') . ' / ' . 'Building: ' . ($order->delivery_address->building ?? 'N/A') . ' / ' . 'Floor: ' . ($order->delivery_address->floor ?? 'N/A') }}')">
                                                        <i id="toggle-icon-{{ $order->id }}" class="fa-solid fa-eye"></i>
                                                    </button>

                                                    <form id="delete-form-{{ $order->id }}" action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination -->
                                <div class="pagination-wrapper">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JavaScript to Handle Dynamic Details -->
    <script>
        function toggleDetails(orderId, orderStatus, paymentStatus, deliveryAddress) {
            // Check if the details row already exists
            const existingDetailsRow = document.getElementById(`details-row-${orderId}`);

            if (existingDetailsRow) {
                // If it exists, toggle its visibility
                const toggleIcon = document.getElementById(`toggle-icon-${orderId}`);
                const isHidden = existingDetailsRow.style.display === 'none';
                existingDetailsRow.style.display = isHidden ? 'table-row' : 'none';
                toggleIcon.classList.toggle('fa-eye');
                toggleIcon.classList.toggle('fa-eye-slash');
            } else {
                // Create a new row dynamically
                const orderRow = document.getElementById(`order-row-${orderId}`);
                const detailsRow = document.createElement('tr');
                detailsRow.id = `details-row-${orderId}`;
                detailsRow.innerHTML = `
                    <td colspan="4">
                        <strong>Order Status:</strong> ${orderStatus}<br>
                        <strong>Payment Status:</strong> ${paymentStatus}<br>
                        <strong>Delivery Address:</strong> ${deliveryAddress}
                    </td>
                `;

                // Insert the details row after the order row
                orderRow.parentNode.insertBefore(detailsRow, orderRow.nextSibling);

                // Update the toggle icon
                const toggleIcon = document.getElementById(`toggle-icon-${orderId}`);
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }

        function confirmDelete(orderId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${orderId}`).submit();
                }
            });
        }
    </script>
@endsection
