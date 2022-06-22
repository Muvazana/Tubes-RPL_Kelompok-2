<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.log');
    }
    public function schedule(Type $var = null)
    {
        return view('member.schedule');
    }
}
