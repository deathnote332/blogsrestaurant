<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FoodCategory extends Model
{
    protected  $table = 'food_category';
    protected  $primaryKey = 'id';
}
