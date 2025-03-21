<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function viewOrders()
    {
        $orders = Orders::where('user_id', auth()->id())->get();
        $user = auth()->user();
        $address = $user->address;

        return view('user.my-account', ['user' => $user, 'orders' => $orders, 'address' => $address]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function addressedit()
    {
        $user = auth()->user();
        $address = $user->address;

        return view('user.edit-address', ['user' => $user, 'address' => $address]);
    }

public function updateAddress(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
    ]);

    $user = auth()->user();
    $address = $user->address()->firstOrCreate([]);
    $address->fill($request->all());
    $address->save();

    return redirect()->back()->with('success', 'Address updated successfully.');
}



}
