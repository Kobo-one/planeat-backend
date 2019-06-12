<?php


namespace App\Http\Controllers\Child;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    const PATH = 'pages/child/';

    public function index(){
        $children = Auth::user()->family->children()->orderByDesc('xp')->get();
        return view(self::PATH.'dashboard',compact('children'));
    }
}
