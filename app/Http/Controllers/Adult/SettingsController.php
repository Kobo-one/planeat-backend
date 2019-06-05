<?php

namespace App\Http\Controllers\Adult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    const PATH = 'pages/adult/settings/';

    public function index(){
        return view(self::PATH.'index');
    }
}
