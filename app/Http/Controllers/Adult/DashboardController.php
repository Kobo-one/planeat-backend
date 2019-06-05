<?php


namespace App\Http\Controllers\Adult;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    const PATH = 'pages/adult/';


    public function index(){
        $user = Auth::user();
        $family = $user->family;
        $todaysplannings = $family->todaysPlannings;
        return view(self::PATH.'dashboard',compact('todaysplannings'));
    }
}
