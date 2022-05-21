<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\VaksinLog;

class ScheduleController extends Controller
{
    public function scheduleLocationView(){

        return view('Schedule/LocationProses')->with([
            'locationData' => LocationController::getLocationData(),
        ]);
    }

    public function scheduleLocationProses(Request $request, $id)
    {

        try{
            Cookie::queue('vaksinLocation_id', $id);
        }catch (\Exception $exception) {
            return view('Schedule/LocationProses')->with([
                'msg' => 'Add Vaksin Location id to cookie Failed!',
                'exceptionErrorMsg' => $exception->getMessage()
            ]);
        }
        return view('Schedule/LocationProses')->with([
            'msg' => 'Add Vaksin Location id to cookie Success!',
            'exceptionErrorMsg' => null
        ]);
    }

    
    public function scheduleVaksinView(){
        return view('Schedule/VaksinProses')->with([
            'locationData' => VaksinController::getVaksinData(),
        ]);
    }

    public function scheduleVaksinProses(Request $request, $id)
    {
        try{
            Cookie::queue('vaksin_id', $id);
        }catch (\Exception $exception) {
            return view('Schedule/VaksinProses')->with([
                'msg' => 'Add Vaksin id to cookie Failed!',
                'exceptionErrorMsg' => $exception->getMessage()
            ]);
        }
        return view('Schedule/LastProses')->with([
            'msg' => 'Add Vaksin id to cookie Success!',
            'exceptionErrorMsg' => null
        ]);
    }
    
    public function scheduleLastView(){
        return view('Schedule/LastProses');
    }

    public function scheduleLastProses(Request $request)
    {
        $user_id = Auth::user()->id;
        $vaksin_id = $request->cookie('vaksin_id');
        $vaksinLocation_id = $request->cookie('vaksinLocation_id');
        $vaksinDate = $request->input("vaksinDate");

        try{
            DB::beginTransaction();
            VaksinLog::create([
                'user_id' => $user_id,
                'vaksin_location_id' => $vaksinLocation_id,
                'data_vaksin_id' => $vaksin_id,
                'status' => "pending",
                'vaksination_date' => $vaksinDate,
            ]);
        }catch (\Exception $exception) {
            DB::rollback();
            return $this->onError('Add Schedule Failed!', $exception->getMessage());
        }
        return $this->onSuccess($data, 'Add Schedule Success!');
    }

}
