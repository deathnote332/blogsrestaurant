<?php

namespace App\Http\Controllers;


use App\Food_List;
use Illuminate\Support\Facades\Request;


class CategoryFoodList extends Controller
{
    public function getFoodList(){
        $category_id = $_POST['category_id'];
        $foodList = Food_List::where('category_id',$category_id)->get();
        return json_encode($foodList);
    }

}
