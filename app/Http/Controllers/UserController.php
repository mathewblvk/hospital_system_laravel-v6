<?php

namespace App\Http\Controllers;

use App\Staff;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Table;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function editprofile(Request $data){
        $this->validate($data, [
            'name'=> 'required|string',
            'email'=> 'required|string',
            'education'=> 'required|string',
            'location'=> 'required|string',
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $staff_code = $user->staff_code;
        $success =  DB::table('users')
            ->where('id', $user_id)
            ->limit(1)
            ->update(array(
                'name' => $data->name,
                'email' => $data->email,
                'education' => $data->education,
                'location' => $data->location,
            ));
       if ($success){
           DB::table('staff')
               ->where('staff_code', $staff_code)
               ->limit(1)
               ->update(array(
                   'name' => $data->name,
                   'email' => $data->email,
                   'education' => $data->education,
                   'location' => $data->location,
               ));
            Alert::success('Success', 'Staff profile updated');
             return redirect()->back();
       }else{
           Alert::error('Error', 'Staff profile failed to update');
           return redirect()->back();
       }
    }

    public function editcontactnumber(Request $data){
        $this->validate($data, [
            'contactnumber' => 'required|min:9|max:10'
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $staff_code = $user->staff_code;
        $success = DB::table('users')->where('id', $user_id)->limit(1)->update(array('contactnumber' => $data->contactnumber,));
        if ($success){
            DB::table('staff')->where('staff_code', $staff_code)->limit(1)->update(array('contactnumber' => $data->contactnumber,));
            Alert::success('Success', 'Contact number updated successfully');
            return redirect()->back();
        }else{
            Alert::error('Error', 'Contact number updated failed');
            return redirect()->back();
        }
    }
    public function changepassword(Request $data){
        $this->validate($data, [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'repeat_password' => 'required|min:8'
        ]);
        if (!Hash::check($data->get('current_password'),Auth::user()->password)){
            Alert::error('error','Your current password does match with the password you provided, Please try again with a different password!');
        };

        if (strcmp($data->get('current_password'),$data->get('new_password')) == 0){
            Alert::error('error','New Password cannot match current password!, please check again');
        };
        if (strcmp($data->get('new_password'),$data->get('repeat_password')) != 0){
            Alert::error('error','Password does not match, Please check again.');
        };

        $user = Auth::user();
        $user->password = bcrypt($data->get('new_password'));
        $user->save();
        Alert::success('success' , 'Password changed succesfully');
        return redirect()->back();
    }

    public function editprofilepicture(Request $data){
        $this->validate($data, [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $staff_code = $user->staff_code;

        $image_name = time() . '.' . $data->profile_picture->getClientOriginalExtension();
        $profile_picture_path = '/dist/img/' .$image_name;
        $data->profile_picture->move(public_path('/dist/img'), $image_name);
        $success = user::where('id', $user_id)->update( array('img_path' => $profile_picture_path));

        if ($success){
            staff::where('staff_code',$staff_code)->update(array(
                'img_path' => $profile_picture_path
            ));
            Alert::success('success','Profile image updated successfully');
            return redirect()->back();
        }else{
            Alert::error('error','Profile image updated failed');
            return redirect()->back();
        }

        }

}
