<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Food_List extends Model
{
    protected  $table = 'food_list';
    protected  $primaryKey = 'id';
}
