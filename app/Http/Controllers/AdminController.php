<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;
use App\Models\Contact;


class AdminController extends Controller
{
    public function adminDashboard()
{

    if(auth()->user()->role !== 'admin') {
        return redirect(url('/my-account'));

    }


    $users = User::all();
    $orders = Orders::all();
    $contacts = Contact::all();

    return view('user.admin', [
        'users' => $users,
        'orders' => $orders,
        'contacts' => $contacts,
    ]);
}

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Pending,Processing,Shipped,Delivered,Cancelled',
    ]);

    $order = Orders::findOrFail($id);

    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}

}
