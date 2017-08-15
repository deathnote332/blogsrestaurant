<?php

namespace App\Http\Controllers;


use App\Food_List;
use Illuminate\Support\Facades\Request;


class CategoryFoodList extends Controller
{
    public function getFoodList(Request $request){

        $foodList = Food_List::where('category_id',$request->category_id)->get();

        return json_encode($foodList);
    }

}
