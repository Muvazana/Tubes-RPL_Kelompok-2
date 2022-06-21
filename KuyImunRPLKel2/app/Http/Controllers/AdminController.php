<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function schedule()
    {
        return view('admin.schedule');
    }
    public function editSchedule($id)
    {
        return view('admin.schedule-edit');
    }
    public function vaccine()
    {
        return view('admin.vaccine');
    }
    public function addVaccine()
    {
        return view('admin.vaccine-add');
    }
    public function patient()
    {
        return view('admin.patient');
    }
    public function editPatient($id)
    {
        return view('admin.patient-edit');
    }
    public function log()
    {
        return view('admin.log');
    }
}
