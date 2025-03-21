<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function details($id)
    {
        $order = Orders::with('user.address')->findOrFail($id);
        return view('user.orders-details', compact('order'));
    }
}
