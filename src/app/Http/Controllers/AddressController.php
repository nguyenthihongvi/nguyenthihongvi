<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::all();
        return response()->json($address);
    }

    public function show($id)
    {
        $address = Address::find($id);

        if ($address) {
            return response()->json($address);
        } else {
            return response()->json(['message' => 'Address not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ]);

        $address = Address::create($validated);
        return response()->json($address, 201);
    }

    public function update(Request $request, $id)
    {
        $address = Address::find($id);

        if ($address) {
            $validated = $request->validate([
                'street' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'postal_code' => 'required|string|max:10',
            ]);

            $address->update($validated);
            return response()->json($address);
        } else {
            return response()->json(['message' => 'Address not found'], 404);
        }
    }

    public function destroy($id)
    {
        $address = Address::find($id);

        if ($address) {
            $address->delete();
            return response()->json(['message' => 'Address deleted successfully']);
        } else {
            return response()->json(['message' => 'Address not found'], 404);
        }
    }
}
