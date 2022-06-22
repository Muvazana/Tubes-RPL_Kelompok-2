<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\VaksinLocation;
use App\Models\VaksinStok;
use App\Models\VaksinLog;
use App\Models\DataVaksin;
use App\Models\User;
use App\Models\UserAdmin;
use App\Models\UserMember;
use App\Models\ParentsInformation;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    // 
    //
    // schedule
    //
    //
    public function schedule()
    {
        return view('admin.schedule');
    }
    public function editSchedule($id)
    {
        return view('admin.schedule-edit');
    }

    // 
    //
    // vaccine
    //
    //
    public function vaccine()
    {
        $user_location_id = Auth::user()->user_admins->vaksin_location_id;
        $data = VaksinStok::with('data_vaksins')->where('vaksin_location_id', $user_location_id)->get();
        return view('admin.vaccine')->with(["data" => $data]);
    }
    public function addVaccine()
    {
        
        $vaksins = DataVaksin::get();
        return view('admin.vaccine-add-edit')->with([
            'title' => "Add Vaccine Stok",
            'url' => "/admin/vaccine/addAction",
            'vaksins' => $vaksins,
        ]);
    }
    public function addVaccineAction(Request $request)
    {
        try {
            $request->validate([
                'data_vaksin_id' => 'required',
                'stok' => 'required',
            ]);

            DB::beginTransaction();
            $user_location_id = Auth::user()->user_admins->vaksin_location_id;
            $data = VaksinStok::create([
                'vaksin_location_id' => $user_location_id,
                'data_vaksin_id' => $request->input('data_vaksin_id'),
                'stok' => $request->input('stok'),
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "Add Vaccine Stok Success!"]);
    }
    public function editVaccine($id)
    {
        try{
            $vaksins = DataVaksin::get();
            $data = VaksinStok::findOrFail($id); 
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return view('admin.vaccine-add-edit')->with([
            'title' => "Edit Vaccine",
            'url' => "/admin/vaccine/editAction/".$id,
            'vaksins' => $vaksins,
            'data' => $data 
        ]);
    }
    public function editVaccineAction(Request $request, $id){
        try {
            $request->validate([
                'data_vaksin_id' => 'required',
                'stok' => 'required',
            ]);

            DB::beginTransaction();
            
            $data = VaksinStok::findOrFail($id);

            $data->update([
                'data_vaksin_id' => $request->input('data_vaksin_id'),
                'stok' => $request->input('stok'),
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "edit Vaccine Stok Success!"]);
    }
    
    public function deleteVaccine($id){
        try {
            DB::beginTransaction();
            VaksinStok::findOrFail($id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "delete Vaccine Stok Success!"]);
    }
    // 
    //
    // patient
    //
    //
    public function patient()
    {
        $data = User::with('user_members', 'user_members.parents_information')->where('role', "member")->get();
        return view('admin.patient')->with(["data" => $data]);
    }
    public function editPatient($id)
    {
        $data = User::with('user_members', 'user_members.parents_information')->findOrFail($id);
        return view('admin.patient-edit')->with([
            'data' => $data,
        ]);
    }
    public function editPatientAction(Request $request, $id){
        try {
            $request->validate([
                'status' => 'required',
            ]);
            DB::beginTransaction();
            
            $data = UserMember::findOrFail($id);

            $data->update([
                'status' => $request->input('status'),
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "edit Patient Success!"]);
    }
    public function deletePatient($id){
        try {
            DB::beginTransaction();

            $parents = ParentsInformation::where('user_id', $id)->get();
            foreach($parents as $parent){
                ParentsInformation::findOrFail($parent->id)->delete();
            }
            $vaksinLogs = VaksinLog::where('user_id', $id)->get();
            foreach($vaksinLogs as $vaksinLog){
                VaksinLog::findOrFail($vaksinLog->id)->delete();
            }
            UserMember::findOrFail($id)->delete();
            User::findOrFail($id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->withErrors(['msg' => $exception->getMessage()]);
        }
        return redirect()->back()->with(['success' => "delete User Member Success!"]);
    }
    
    // 
    //
    // log
    //
    //
    public function log()
    {
        return view('admin.log');
    }
}
