<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MenuList extends Model
{
    protected  $table = 'menus_list';
    protected  $primaryKey = 'id';
}
