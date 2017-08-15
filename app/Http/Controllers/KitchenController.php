<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Theme;
use App\Sample;

class KitchenController extends Controller
{
    public function kitchenPage(){
        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('kitchen.kitchen')->render();

    }

    public function ingredientPage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('admin.ingredient')->render();

    }

    public function menuPage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('admin.menu')->render();

    }

    public function loadajaxPage(){
        return view('transactionajax');
    }
}
