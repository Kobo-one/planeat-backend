<?php

namespace App\Http\Controllers\Adult;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroceriesController extends Controller
{
    const PATH = 'pages/adult/groceries/';

    public function index(){
        return view(self::PATH.'index');
    }
}
