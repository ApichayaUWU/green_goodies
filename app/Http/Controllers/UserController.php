<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //add this line
use Illuminate\Support\Facades\Storage; //add this line
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->file('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $fileName = time().'_'.$request->file('profile_photo')->getClientOriginalName();
            $filePath = $request->file('profile_photo')->storeAs('profile_photos', $fileName, 'public');

            $user->profile_photo = $filePath;
            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'profile-photo-updated');
    }
}
