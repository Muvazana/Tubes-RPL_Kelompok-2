<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\VaksinLocation;
use App\Models\VaksinLog;

class MemberController extends Controller
{
    public function index()
    {
        $data = VaksinLog::with(['vaksin_locations', 'data_vaksins'])->where('user_id', Auth::user()->id)->get();
        return view('member.log')->with(['data' => $data]);
    }
    public function schedule()
    {
        $locations = VaksinLocation::get();
        return view('member.schedule')->with(['locations' => $locations]);
    }
    public function addScheduleAction(Request $request)
    {
        try {
            $request->validate([
                'vaksination_date' => 'required',
                'vaksin_location_id' => 'required',
            ]);

            DB::beginTransaction();
            $data = VaksinLog::create([
                'user_id' => Auth::user()->id,
                'vaksin_location_id' => $request->input('vaksin_location_id'),
                'status' => 'pending',
                'vaksination_date' => date('Y-m-d', strtotime($request->input('vaksination_date'))),
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Add Schedule Success!"]);
    }
}
