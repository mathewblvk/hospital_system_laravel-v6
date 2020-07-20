<?php

namespace App\Http\Controllers;

use App\Staff;
use App\User;
use App\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function addStaff(){
        $roles = Role::all();
        return view('staffs.index')->with('roles', $roles);
    }

    public function registerStaff(Request $request)
    {
        $staff = new Staff;
        $today_regs = (int) Staff::whereDate('created_at', date("Y-m-d"))->count();

        $number = $today_regs + 1;
        $year = date('Y') % 100;
        $month = date('m');
        $day = date('d');
        $staff_code = $year . $month . $day . $number;


        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->staff_code = $staff_code;
        $staff->password = Hash::make($request->password);
        $staff->role_id = $request->role_id;
        $success = $staff->save();

        if ($success){
            $user = new User;
            $user->name =$staff->name;
            $user->email =$staff->email;
            $user->email_verified_at = now();
            $user->Staff_code =$staff->staff_code;
            $user->password =$staff->password;
            $user->role_id = $request->role_id;
            $user->save();

//            Alert::success('Success', 'Staff '. $request->name. ' registration successful!');
//            return redirect()->back();
        }else{
//            Alert::error('Error', 'Staff registration failed');
//            return redirect()->back();
        }

        }

//        Display staff

        public function displayStaffList(){
            return view('staffs.index', ['staffs' => Staff::all() , 'roles' => Role::all()]);
        }

    public function editStaffInfo($id){
        $staff = Staff::find($id);
        return view('staff.index')->with($staff, 'staff');
        }


}
