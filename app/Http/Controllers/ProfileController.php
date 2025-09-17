<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
   public function store(Request $request)
{
    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'country_of_residence' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|in:male,female',
        'height' => 'nullable|string|max:50',
        'weight' => 'nullable|string|max:50',
        'religion' => 'nullable|string|max:50',
        'complexion' => 'nullable|string|max:50',
        'rasi' => 'nullable|string|max:50',
        'nakshatra' => 'nullable|string|max:50',
        'education_level' => 'nullable|string|max:50',
        'marital_status' => 'nullable|string|max:50',
        'job' => 'nullable|string|max:100',
        'caste' => 'nullable|string|max:50',
        'register_person_name' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:50',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'chartphoto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'expectation' => 'nullable|string|max:255',
    ]);

    $userId = Auth::id(); // Get logged-in user's ID

    // Upload chart photo
    $chartPath = null;
    if ($request->hasFile('chartphoto')) {
        $chartPath = $request->file('chartphoto')->store('charts', 'public');
    }

    // Insert into profiles table
    $profileId = DB::table('profiles')->insertGetId([
        'user_id' => $userId,  // Added user_id
        'name' => $request->name,
        'country_of_residence' => $request->country_of_residence,
        'dob' => $request->dob,
        'gender' => $request->gender,
        'height' => $request->height,
        'weight' => $request->weight,
        'religion' => $request->religion,
        'complexion' => $request->complexion,
        'rasi' => $request->rasi,
        'nakshatra' => $request->nakshatra,
        'education_level' => $request->education_level,
        'marital_status' => $request->marital_status,
        'job' => $request->job,
        'caste' => $request->caste,
        'register_person_name' => $request->register_person_name,
        'phone_number' => $request->phone_number,
        'chartphoto' => $chartPath,
        'expectation' => $request->expectation,
    ]);

    // Upload multiple photos
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $photoPath = $photo->store('photos', 'public');
            DB::table('profile_photos')->insert([
                'profile_id' => $profileId,
                'photo_path' => $photoPath,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Profile submitted successfully!');
}

public function index()
{
    // Get all profiles with their photos
    $profiles = DB::table('profiles')
        ->leftJoin('profile_photos', 'profiles.id', '=', 'profile_photos.profile_id')
        ->select(
            'profiles.*',
            DB::raw('GROUP_CONCAT(profile_photos.photo_path) as photos')
        )
        ->groupBy('profiles.id')
        ->orderBy('profiles.created_at', 'desc')
        ->get();

    return view('allprofiles', compact('profiles'));
}


public function showProfile($id)
{
    $profile = DB::table('profiles')
        ->leftJoin('profile_photos', 'profiles.id', '=', 'profile_photos.profile_id')
        ->select(
            'profiles.*',
            DB::raw('GROUP_CONCAT(profile_photos.photo_path) as photos')
        )
        ->where('profiles.id', $id)
        ->groupBy('profiles.id')
        ->first();

    // Convert photos to array
    if ($profile && $profile->photos) {
        $profile->photos = explode(',', $profile->photos);
    } else {
        $profile->photos = [];
    }

    return view('profiledetails', compact('profile'));
}




}
