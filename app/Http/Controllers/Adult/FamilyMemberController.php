<?php

namespace App\Http\Controllers\Adult;

use App\FamilyMember;
use App\MemberQuest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FamilyMemberController extends Controller
{
    const PATH = 'pages/adult/family/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Auth::user()->family->children;
        return view(self::PATH.'index', compact('members'));
    }

    public function quests(FamilyMember $child)
    {
        return view(self::PATH.'quests', compact('child'));
    }

    public function ratings(FamilyMember $child)
    {
        $memberQuests = MemberQuest::where('family_member_id',$child->id)->whereNotNull('xp_gained')->get();
        return view(self::PATH.'ratings', compact('child','memberQuests'));
    }

    public function difficulties(FamilyMember $child)
    {
        return view(self::PATH.'difficulties', compact('child'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyMember $child)
    {
        return view(self::PATH.'detail', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyMember $familyMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyMember $familyMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamilyMember  $familyMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyMember $familyMember)
    {
        //
    }
}
