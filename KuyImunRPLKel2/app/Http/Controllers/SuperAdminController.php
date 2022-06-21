<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\VaksinLocation;
use App\Models\VaksinStok;
use App\Models\VaksinLog;
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

    
    // 
    //
    // administrator
    //
    //
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
        $locations = VaksinLocation::get();
        return view('superadmin.administrator-add-edit')->with([
            'title' => "Add Administrator",
            'url' => "/superadmin/administrator/addAction",
            'locations' => $locations,
        ]);
    }
    public function addAdministratorAction(Request $request){
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
    public function editAdministrator($id)
    {
        try{
            $locations = VaksinLocation::get();
            $data = User::with(['user_admins'])->findOrFail($id);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return view('superadmin.administrator-add-edit')->with([
            'title' => "Edit Administrator",
            'url' => "/superadmin/administrator/editAction/".$id,
            'locations' => $locations,
            'data' => $data 
        ]);
    }

    public function editAdministratorAction(Request $request, $id){
        try {
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'vaksin_location_id' => 'required',
                'name' => 'required',
            ]);

            DB::beginTransaction();
            
            $data = User::findOrFail($id);
            $pass = $data->password;
            if($request->has('password')){
                $pass = Hash::make($request->input('password'));
            }
            
            $data->update([
                'username' => strtolower($request->input('username')),
                'email' => strtolower($request->input('email')),
                'password' => $pass,
            ]);
            $data = UserAdmin::findOrFail($id);
            $data->update([
                'vaksin_location_id' => $request->input('vaksin_location_id'),
                'name' => $request->input('name'),
            ]);
            $data = $data->with('users')->get();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Edit Administrator Sucess!"]);
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

    
    // 
    //
    // patient
    //
    //
    public function patient()
    {
        $data = User::with('user_members', 'user_members.parents_information')->where('role', "member")->get();
        return view('superadmin.patient')->with(["data" => $data]);
    }


    // 
    //
    // Location
    //
    //
    public function location()
    {
        $data = VaksinLocation::select(['vaksin_locations.*',  DB::raw("(CASE WHEN i.admin_count IS NOT NULL THEN i.admin_count ELSE 0 END) as admin_count")])
        ->leftjoin(DB::raw("(SELECT vaksin_location_id, COUNT(*) as admin_count FROM user_admins GROUP BY user_admins.vaksin_location_id) as i"), 'i.vaksin_location_id', '=', 'vaksin_locations.id')
        ->get();
        return view('superadmin.location')->with(["data" => $data]);
    }
    public function addLocation()
    {
        return view('superadmin.location-add-edit')->with([
            'title' => "Add Location",
            'url' => "/superadmin/location/addAction",
        ]);
    }
    
    public function addLocationAction(Request $request)
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
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Add Location Sucess!"]);
    }

    public function editLocation($id)
    {
        try{
            $data = VaksinLocation::findOrFail($id); 
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return view('superadmin.location-add-edit')->with([
            'title' => "Edit Location",
            'url' => "/superadmin/location/editAction/".$id,
            'data' => $data 
        ]);
    }
    public function editLocationAction(Request $request, $id){
        try {
            $request->validate([
                'address' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
            ]);

            DB::beginTransaction();
            
            $data = VaksinLocation::findOrFail($id);

            $data->update([
                'address' => strtolower($request->input('address')),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "edit Location Sucess!"]);
    }
    public function deleteLocation($id){
        try {
            DB::beginTransaction();
            
            $location = VaksinLocation::findOrFail($id);
            $admins = UserAdmin::where('vaksin_location_id', $id)->get();
            foreach($admins as $admin){
                UserAdmin::findOrFail($admin->user_id)->delete();
                User::findOrFail($admin->user_id)->delete();
            }
            $vaksinStoks = VaksinStok::where('vaksin_location_id', $id)->get();
            foreach($vaksinStoks as $vaksinStok){
                VaksinStok::findOrFail($vaksinStok->id)->delete();
            }
            $vaksinStoks = VaksinLog::where('vaksin_location_id', $id)->get();
            foreach($vaksinStoks as $vaksinStok){
                VaksinLog::findOrFail($vaksinStok->id)->delete();
            }
            $location->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "delete Location Sucess!"]);
    }
}
