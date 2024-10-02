<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserAddressController extends Controller
{
    
    /**
     * Display the user's addresses form for editing or adding.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $addresses = $user->address; // Get all addresses for the current user

        return view('profile.edit-address', [
            'user' => $user,
            'addresses' => $addresses,
        ]);
    }

    /**
     * Display the user's addresses form for editing or adding.
     */
    public function form(Request $request): View
    {
        if($request){

        $user = Auth::user();
        $addresses = $user->address; // Get all addresses for the current user

        return view('profile.create-address', [
            'user' => $user,
            'addresses' => $addresses,
        ]);
        }   
    }

    // for edit-address page
    public function edit($id): View
    {
        $user = Auth::user();
        $address = UserAddress::where('user_id', $user->id)->where('id', $id)->firstOrFail();

        return view('profile.edit-address', [
            'address' => $address,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = $request->user();

        // Validate the address input
        $request->validate([
            'address_name'=>'required|string|max:100',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'sub_district' => 'required|string|max:100',
        ]);

        // Find the address and ensure it belongs to the user
        $address = UserAddress::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        $address->update($request->all());

        return Redirect::route('profile.edit')->with('status', 'address-updated');
    }



    /**
     * Store or update addresses.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        // Validate the address input
        $request->validate([
            'addresses.*address_name' => 'required|string|max:100',
            'addresses.*.address_line1' => 'required|string|max:255',
            'addresses.*.address_line2' => 'nullable|string|max:255',
            'addresses.*.city' => 'required|string|max:100',
            'addresses.*.district' => 'required|string|max:100',
            'addresses.*.sub_district' => 'required|string|max:100',
        ]);

        // Loop through submitted addresses and either create or update
        foreach ($request->addresses as $addressId => $addressData) {
            if ($addressId == 'new') {
                // Create a new address
                UserAddress::create([
                    'user_id' => $user->id,
                    'address_name' => $addressData['address_name'],
                    'address_line1' => $addressData['address_line1'],
                    'address_line2' => $addressData['address_line2'],
                    'city' => $addressData['city'],
                    'district' => $addressData['district'],
                    'sub_district' => $addressData['sub_district'],
                ]);
            } else {
                // Update existing address
                $existingAddress = UserAddress::findOrFail($addressId);
                if ($existingAddress->user_id === $user->id) { // Ensure the address belongs to the user
                    $existingAddress->update($addressData);
                }
            }
        }

        return Redirect::route('profile.edit')->with('status', 'addresses-updated');
    }

    /**
     * Delete a user address.
     */
    public function destroy($id)
    {
        $address = UserAddress::findOrFail($id);

        // Ensure the address belongs to the logged-in user
        if ($address->user_id === Auth::id()) {
            $address->delete();
        }

        return Redirect::route('profile.edit')->with('status', 'address-deleted');
    }

}