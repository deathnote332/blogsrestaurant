<?php

namespace App\Http\Controllers;

use App\FoodCategory;


class CategoryController extends Controller
{
    public function getCategory(){

       $category = FoodCategory::all();

        return json_encode($category);
    }

}
