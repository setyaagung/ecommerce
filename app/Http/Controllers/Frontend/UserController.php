<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function myprofile()
    {
        return view('frontend.user.profile');
    }

    public function profileupdate(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            Storage::delete($user->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $data['image'] = Storage::putFileAs('public/user/profile', $request->file('image'), $filename);
        }
        $user->update($data);
        return redirect()->route('my-profile')->with('update', 'Data anda berhasil diperbarui');
    }
}
