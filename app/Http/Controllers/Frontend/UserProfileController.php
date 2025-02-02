<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
class UserProfileController extends Controller
{
    public function index(){
        return view('frontend.profile');
    } 
    public function updateProfile(Request $request){
        $request->validate([
            'name'=>['required', 'max:100'],
            'email'=>['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'image'=>['image', 'max:2048']
        ]);
        
        $user = Auth::user();


        if($request->hasFile('image'))
        {
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);

            $path = "/upload/".$imageName;

            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile Update Successfully');

        return redirect()->back();
    }
}
