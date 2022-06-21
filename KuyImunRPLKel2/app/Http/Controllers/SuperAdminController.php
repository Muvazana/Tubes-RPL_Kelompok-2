<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\VaksinLocation;
use App\Models\DataVaksin;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\UserMember;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }
    public function vaccine()
    {
        $data = DataVaksin::get();
        return view('superadmin.vaccine')->with(["data" => $data]);
    }
    public function administrator()
    {
        $data = User::with(["user_admins", "user_super_admins"])
        ->where(function ($query){
            $query->where('role', "admin")
                  ->orWhere('role', "super_admin");
        })->get();
        return view('superadmin.administrator')->with(["data" => $data]);
    }
    public function addAdministrator()
    {
        return view('superadmin.administrator-add-edit')->with([
            'title' => "Add Administrator",
            'url' => "/superadmin/registerAdminAction",
        ]);
    }
    public function editAdministrator($id)
    {
        try{
            $data = User::with('user_admins')->findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return view('superadmin.administrator-add-edit')->with([
            'title' => "Edit Administrator",
            'url' => "/superadmin/editAdminAction",
            'data' => $data 
        ]);
    }
    public function patient()
    {
        $data = User::with('user_members', 'user_members.parents_information')->where('role', "member")->get();
        return view('superadmin.patient')->with(["data" => $data]);
    }


    public function addVaksinLocationAction(Request $request)
    {
        try {
            $request->validate([
                'address' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);

            DB::beginTransaction();
            $data = VaksinLocation::create([
                'address' => strtolower($request->input('address')),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            // TODO when add VaksinLocation Error
            return response()->json([
                'msg' => $exception->getMessage(),
            ]);
        }

        // TODO when add VaksinLocation Success
        return response()->json([
            'msg' => "Sucess",
        ]);
    }

    public function registerAdminAction(Request $request){
        $role = "admin";
        try {
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'vaksin_location_id' => 'required',
                'name' => 'required',
            ]);

            DB::beginTransaction();
            $data = User::create([
                'username' => strtolower($request->input('username')),
                'email' => strtolower($request->input('email')),
                'password' => Hash::make($request->input('password')),
                'role' => $role
            ]);
            $data = UserAdmin::create([
                'user_id' => $data->id,
                'vaksin_location_id' => $request->input('vaksin_location_id'),
                'name' => $request->input('name'),
            ]);
            $data = $data->with('users')->get();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Add Administrator Sucess!"]);
    }

    public function editAdminAction(Request $request){
        $role = "admin";
        try {
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'vaksin_location_id' => 'required',
                'name' => 'required',
            ]);

            DB::beginTransaction();
            
            $data = User::where('username', strtolower($request->input('username')))
                    ->where('email', strtolower($request->input('email')))
                    ->first();

            $data->update([
                'password' => Hash::make($request->input('password')),
            ]);
            $data = UserAdmin::create([
                'user_id' => $data->id,
                'vaksin_location_id' => $request->input('vaksin_location_id'),
                'name' => $request->input('name'),
            ]);
            $data = $data->with('users')->get();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Add Administrator Sucess!"]);
    }

    public function deleteAdministratorAction($id){
        try {

            DB::beginTransaction();
            UserAdmin::findOrFail($id)->delete();
            User::findOrFail($id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Add Administrator Sucess!"]);
    }
}
