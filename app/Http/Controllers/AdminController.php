<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    
    public function dest(){
        return view('admin.masterAdmin');
    }



    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification= array(
            'message'=>'User Logout Successfully',
            'alert-type'=>'success'
        );
        return redirect('/login')->with($notification);
    } 
    
    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view("admin.admin_profile_view", compact('adminData'));
    }
        
    public function img()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view("/admin/header", compact('adminData'));
    }
    
    public function profile_edite()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view("admin.admin_profile_edite", compact('adminData'));
    }
     

    public function profile_store(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username; 
        
        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = $filename;
        }
        
     //   if ($request->password == $request->cpassword) {
      //      $data->password = Hash::make($request->password);
       
        //} 
        else {
            // Handle the case of password and confirm password mismatch here
           // session()->flash('error', 'Password and Confirm Password do not match.');
            return redirect()->back()->withInput();
        }
       
        // Save the changes to the database
        $data->save();
        
        $notification= array(
            'message'=>'Admin Profile Updated Successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }


         public function Edite_password(){

            return view("/admin/change_password");

        }
        public function change_password(Request $request)
        {
            $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required',
                'cpassword' => 'required|same:password',
            ]);
        
            $hashedPassword = Auth::user()->password;
if (Hash::check($request->oldpassword, $hashedPassword)) {
    $user = User::find(Auth::id());
    $user->password = bcrypt($request->password);
    $user->save();


    session()->flash('message', 'Password Updated Successfully.');
}    else{
                               session()->flash('message', ' Old password is not match.');

                               return redirect()->back()->withInput();

                  }
        
            }
        }
        

