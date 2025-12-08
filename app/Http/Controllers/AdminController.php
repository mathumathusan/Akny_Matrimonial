<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = DB::table('profiles')->get();
        return view('admin.home', compact('users'));
    }

    public function approve(Request $request, $id)
    {
        DB::table('profiles')
            ->where('id', $id)
            ->update(['isApprove' => $request->isApprove]);

        return response()->json([
            'success'   => true,
            'isApprove' => $request->isApprove
        ]);
    }
public function show($id)
{
    $user = DB::table('profiles')->where('id', $id)->first();
    $photos = DB::table('profile_photos')->where('profile_id', $id)->get();

    return view('admin.user-details', compact('user', 'photos'));
}


public function edit($id)
{
    $user = DB::table('profiles')->where('id', $id)->first();
    $photos = DB::table('profile_photos')->where('profile_id', $id)->get();

    return view('admin.edit-user', compact('user', 'photos'));
}

public function update(Request $request, $id)
{
    DB::table('profiles')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
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
            'expectation' => $request->expectation,
            'updated_at' => now()
        ]);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}


public function uploadPhoto(Request $request, $id)
{
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');

        DB::table('profile_photos')->insert([
            'profile_id' => $id,
            'photo_path' => $path,
            'created_at' => now()
        ]);
    }

    return redirect()->back()->with('success', 'Photo uploaded successfully!');
}


public function deletePhoto($photo_id)
{
    DB::table('profile_photos')->where('id', $photo_id)->delete();

    return response()->json(['success' => true]);
}


public function deleteUser($id)
{
    DB::table('profile_photos')->where('profile_id', $id)->delete();
    DB::table('profiles')->where('id', $id)->delete();

    return redirect('/admin')->with('success', 'User deleted successfully!');
}

public function updateChartPhoto(Request $request, $id)
{
    $request->validate([
        'chartphoto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('chartphoto')) {
        $path = $request->file('chartphoto')->store('charts', 'public');

        DB::table('profiles')->where('id', $id)->update([
            'chartphoto' => $path,
            'updated_at' => now()
        ]);
    }

    return redirect()->back()->with('success', 'Chart photo updated successfully!');
}


public function deleteChartPhoto($id)
{
    $user = DB::table('profiles')->where('id', $id)->first();

    if ($user && $user->chartphoto) {
        // Delete the file from storage
        if (file_exists(storage_path('app/public/' . $user->chartphoto))) {
            unlink(storage_path('app/public/' . $user->chartphoto));
        }

        // Remove path from DB
        DB::table('profiles')->where('id', $id)->update([
            'chartphoto' => null,
            'updated_at' => now()
        ]);
    }

    return redirect()->back()->with('success', 'Chart photo deleted successfully!');
}





}
