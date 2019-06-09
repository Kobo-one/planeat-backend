<?php

namespace App\Http\Controllers\Adult;

use App\GroceryItems;
use App\GroceryList;
use App\Http\Requests\StoreGroceryItem;
use App\Http\Requests\StoreGroceryList;
use App\Http\Requests\StoreGroceryPlanning;
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

        if ($groceryList->family != Auth::user()->family) {
            abort(403, 'Access denied');
        }

        $groceryItems = $groceryList->items->sortBy('updated_at')->sortBy('completed');

        return view(self::PATH.'detail', compact('groceryList','groceryItems'));
    }

    public function addItem(StoreGroceryItem $request){
        $familyId= Auth::user()->family->id;
        $groceryList = GroceryList::find($request->grocery_list);

        if ($groceryList->family != Auth::user()->family) {
            abort(403, 'Access denied');
        }
        $data = [
            'grocery_list_id' => $request->grocery_list,
            'name' => $request->name,
            'size' => $request->size,
        ];
        $groceryItems = GroceryItems::create($data);

        return redirect()->route('groceries_detail', $groceryList)->with('success','Your item has been added!');
    }

    public function addPlanning(StoreGroceryPlanning $request){
        $familyId= Auth::user()->family->id;
        $groceryList = GroceryList::find($request->grocery_list);

        if ($groceryList->family != Auth::user()->family) {
            abort(403, 'Access denied');
        }
        $data = [
            'grocery_list_id' => $request->grocery_list,
            'name' => $request->name,
            'size' => $request->size,
        ];
        $groceryItems = GroceryItems::create($data);

        return redirect()->route('groceries_detail', $groceryList)->with('success','Your item has been added!');
    }


    public function done(GroceryList $groceryList, GroceryItems $groceryItem){
        $groceryItem->completed = true;
        $groceryItem->save();
        return redirect()->route('groceries_detail', $groceryList);
    }

    public function undone(GroceryList $groceryList, GroceryItems $groceryItem){
        $groceryItem->completed = false;
        $groceryItem->save();
        return redirect()->route('groceries_detail', $groceryList);
    }
}
