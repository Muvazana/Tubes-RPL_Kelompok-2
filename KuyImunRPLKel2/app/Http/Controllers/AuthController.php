<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\UserMember;
use App\Models\ParentsInformation;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request){
        try {
            // 'inputEmailOrUsername' => 'required',
            // 'inputPassword' => 'required',
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $data = User::where(function ($query) use ($request){
                $query->where('username', strtolower($request->input('username')))
                      ->orWhere('email', strtolower($request->input('username')));
            })->first();

            if(!$data || !Hash::check($request->input('password'), $data->password)){
                throw ValidationException::withMessages(['user' => 'Username atau Password Salah!']);
            }

            if(Auth::loginUsingId($data->id)){
                if(Auth::user()->role == "super_admin") return redirect()->route("superAdminDashboard");
                else if(Auth::user()->role == "admin") return redirect()->route("adminDashboard");
                else return redirect()->route("memberDashboard");
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
    }
    public function logoutAction(Request $request){
        try {
            Auth::logout();
            return redirect()->route("login");
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
    }

    public function register()
    {
        return view('register');
    }
    public function registerMemberAction(Request $request){
        $role = "member";
        try {
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'child_nik' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'child_gender' => 'required',
                'child_birth_date' => 'required',
                'father_nik' => 'required',
                'father_name' => 'required',
                'mother_nik' => 'required',
                'mother_name' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip_code' => 'required',
            ]);

            DB::beginTransaction();
            $data = User::create([
                'username' => strtolower($request->input('username')),
                'email' => strtolower($request->input('email')),
                'password' => Hash::make($request->input('password')),
                'role' => $role
            ]);
            $child_name = strtolower($request->input('first_name')).' '.strtolower($request->input('last_name'));
            UserMember::create([
                'user_id' => $data->id,
                'nik' => $request->input('child_nik'),
                'child_name' => $child_name,
                'child_gender' => $request->input('child_gender'),
                'child_birth_date' => date('Y-m-d', strtotime($request->input('child_birth_date'))),
                'phone_number' => $request->input('phone_number'),
                'address' => strtolower($request->input('address')),
                'optional_address' => strtolower($request->input('optional_address')),
                'zip_code' => $request->input('zip_code'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                // 'latitude' => $request->input('email'), // TODO Change with real data
                // 'longitude' => $request->input('email'), // TODO Change with real data
                'document_path' => "Just Dmumy", // TODO Change with real data
                'status' => 'not_verified',
            ]);
            ParentsInformation::create([
                'user_id' => $data->id,
                'nik' => $request->input('father_nik'),
                'name' => $request->input('father_name'),
                'parent_type' => 'father',
            ]);
            ParentsInformation::create([
                'user_id' => $data->id,
                'nik' => $request->input('mother_nik'),
                'name' => $request->input('mother_name'),
                'parent_type' => 'mother',
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Create Account Success!"]);
    }
}
