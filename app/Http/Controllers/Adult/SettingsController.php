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

    public function notification(){
        $title = 'Notifications';
        return view(self::PATH.'empty',compact('title'));
    }

    public function family(){
        $title = 'Manage Family';
        return view(self::PATH.'empty',compact('title'));
    }

    public function profile(){
        $title = 'Profile';
        return view(self::PATH.'empty',compact('title'));
    }

}
