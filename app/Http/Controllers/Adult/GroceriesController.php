<?php

namespace App\Http\Controllers\Adult;

use App\GroceryItems;
use App\GroceryList;
use App\Http\Requests\StoreGroceryList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroceriesController extends Controller
{
    const PATH = 'pages/adult/groceries/';

    public function index(){
        $familyId= Auth::user()->family->id;
        $groceryLists = GroceryList::where('family_id',$familyId)->get();

        return view(self::PATH.'index', compact('groceryLists'));
    }

    public function create(StoreGroceryList $request){
        $familyId= Auth::user()->family->id;

        $data = [
            'name' => $request->name,
            'family_id' => $familyId,
        ];
        $groceryList = GroceryList::create($data);

        return redirect()->route('groceries_index')->with('success','Your list has been created, start adding ingredients!');
    }


    public function show(GroceryList $groceryList){
        $groceryItems = GroceryItems::where('grocery_list_id',$groceryList->id)->get();

        return view(self::PATH.'detail', compact('groceryItems'));
    }


}
