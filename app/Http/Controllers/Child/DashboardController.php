<?php


namespace App\Http\Controllers\Child;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    const PATH = 'pages/child/';

    public function index(){
        return view(self::PATH.'dashboard');
    }
}
