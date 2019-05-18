<?php


namespace App\Http\Controllers\Adult;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    const PATH = 'pages/adult/';

    public function index(){
        return view(self::PATH.'dashboard');
    }
}
