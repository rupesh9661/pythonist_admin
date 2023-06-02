<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function profile(){
        return view('User.profile');
    }
    public function update_profile(Request $request){
        // dd($request);
        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $img_name = $image->getClientOriginalName();
            $img_final_name = "profile_image" . date("YmdHis") . $img_name;
            // $path = public_path('images/profile_images/');
            $path='images/profile_images/';
            $image->move($path, $img_final_name);
            User::whereId($request->user_id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'about' => $request->about,
                'twitter_profile' => $request->twitter,
                'facebook_profile' => $request->facebook,
                'instagram_profile' => $request->instagram,
                'linkedin_profile' => $request->linkedin,
                'profile_image'=>$img_final_name 
            ]); 
        }else{
       User::whereId($request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'about' => $request->about,
            'twitter_profile' => $request->twitter,
            'facebook_profile' => $request->facebook,
            'instagram_profile' => $request->instagram,
            'linkedin_profile' => $request->linkedin  
        ]);  
       } 
      return redirect()->back()->with('success', 'profile updated successfully');   
   
    }
    public function update_password(Request $request){
       User::whereId($request->user_id)->update([
            'password'=>bcrypt($request->password)
        ]);   
      return redirect()->back()->with('success', 'profile updated successfully');   
   
    }
}
