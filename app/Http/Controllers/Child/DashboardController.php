<?php


namespace App\Http\Controllers\Child;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    const PATH = 'pages/child/';

    public function index(){
        $children = Auth::user()->family->members()->whereHas('roles', function ($query) {
            $query->where('name', 'Child');
        })->get();
        return view(self::PATH.'dashboard',compact('children'));
    }
}
