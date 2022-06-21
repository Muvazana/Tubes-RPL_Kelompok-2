<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

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

    public function registerMemberAction(Request $request){
        $role = "member";
        try {
            $request->validate([
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);

            DB::beginTransaction();
            $data = User::create([
                'username' => strtolower($request->input('username')),
                'email' => strtolower($request->input('email')),
                'password' => Hash::make($request->input('password')),
                'role' => $role
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            // TODO when register member Error
            return response()->json([
                'msg' => $exception->getMessage(),
            ]);
        }

        // TODO when register member Success
        return response()->json([
            'msg' => "Sucess",
        ]);
    }
}
