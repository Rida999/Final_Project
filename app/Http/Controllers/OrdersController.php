<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\orderstatus;
use App\Models\paymentstatus;
use App\Models\addresses;
class OrdersController extends Controller
{

    public function edit($id)
    {
        $order = orders::findOrFail($id);
        $users = User::all();
        $orderStatuses = orderstatus::all();
        $paymentStatuses = paymentstatus::all();
        $addresses = addresses::with('city')->get();
    
        return view('EditOrders', compact('order', 'users', 'orderStatuses', 'paymentStatuses', 'addresses'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_status_id' => 'required|exists:order_status,id',
            'payment_status_id' => 'required|exists:payment_status,id',
            'delivery_address_id' => 'required|exists:addresses,id',
            'total' => 'required|numeric|min:0',
        ]);
    
        $order = orders::findOrFail($id);
        $order->user_id = $request->user_id;
        $order->order_status_id = $request->order_status_id;
        $order->payment_status_id = $request->payment_status_id;
        $order->delivery_address_id = $request->delivery_address_id;
        $order->total = $request->total;
        $order->save();
    
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }
    

    public function destroy($id)
    {
        $order = orders::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
    public function index()
    {
        $orders = Orders::with(['user', 'order_status', 'payment_status', 'delivery_address.city'])
            ->latest()
            ->paginate(10);
    
        return view('ListOrders', compact('orders'));
    }
    


}
