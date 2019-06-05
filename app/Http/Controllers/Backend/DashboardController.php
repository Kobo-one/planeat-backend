<?php


namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    const PATH = 'pages/backend/';

    public function index(){
        return view(self::PATH.'dashboard');
    }
}
