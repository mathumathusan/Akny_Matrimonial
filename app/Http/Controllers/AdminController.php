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

}
