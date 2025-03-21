<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        // Read the contents of the plants.json file
        $plantsJson = Storage::disk('local')->get('plants/plants.json');

        // Parse the JSON content into an associative array
        $plants = json_decode($plantsJson, true);

        return view('guest.shop', ['plants' => $plants]);
    }
    public function viewproduct($id){
        $plantsJson = Storage::disk('local')->get('plants/plants.json');

        $plants = json_decode($plantsJson, true);

        $product = null;
        foreach ($plants as $plant) {
            if ($plant['id'] == $id) {
                $product = $plant;
                break;
            }
        }
        return view('guest.product-view', compact('product'));
    }


}
