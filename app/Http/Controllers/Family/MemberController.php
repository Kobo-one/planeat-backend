<?php

namespace App\Http\Controllers\Family;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $members = Auth::user()->familyMembers;
        //dd($members);
        return view('pages.family.switch_member',compact('members'));
    }

    public function login(Request $request){
        session(['member'=> $request->memberId]);
        return redirect()->route('home');
    }

}
