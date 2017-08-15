<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Theme;
use App\Sample;

class CashierController extends Controller
{
    public function cashierPage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('cashier.cashier')->render();

    }
    public function transactionPage(Request $request){

        $theme = Theme::uses('default')->layout('default')->setTitle('');

        $data = Transaction::where('id',$request->id)->first();

        $view = array(
            'id' =>$data->id,
            'list' => $data->menu_list,
            'total' =>$data->t
        );

        return $theme->scope('cashier.transaction',$view)->render();

    }
}
