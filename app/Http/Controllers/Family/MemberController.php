<?php

namespace App\Http\Controllers\Family;

use App\FamilyMember;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $members = Auth::user()->family->members;
        //dd($members);
        return view('pages.family.switch_member',compact('members'));
    }

    public function login(Request $request){
        $member = FamilyMember::find($request->memberId);
        if($member->hasRole('Parent')){
            if(Hash::check($request->pincode,$member->pincode)){
                session(['member'=> $request->memberId]);
            }else{
                return redirect()->route('member_index')->with('warning','Wrong pincode entered');
            }
        }else{
            session(['member'=> $request->memberId]);
        }
        return redirect()->route('home');
    }

    public function logout(){
        session(['member'=> null]);
        return redirect()->route('home');
    }

}
