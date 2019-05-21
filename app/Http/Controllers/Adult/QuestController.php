<?php

namespace App\Http\Controllers\Adult;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestController extends Controller
{
    const PATH = 'pages/adult/';

    public function index(){

        $listItems = [];
        $quests = Auth::user()->family->quests->whereBetween('date', [Carbon::now()->toDateString(), Carbon::now()->addDays(7)->endOfWeek()->toDateString()] );

        for($i = 0; $i < 7; $i++){
            $day = Carbon::now()->addDays($i);
            $listItems[] = ['day'=>$day->englishDayOfWeek,'date'=>$day->toDateString(),'quests'=>$quests->where('date',$day->toDateString())->first()];
        }

        $quests = $quests->all();
        return view(self::PATH.'quests/index',compact('listItems','quests'));
    }

    public function create($date){
        return view(self::PATH.'quests/create',compact('ingredients'));
    }
}
