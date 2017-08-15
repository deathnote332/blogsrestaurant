<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Theme;
use Yajra\Datatables\Facades\Datatables;
use App\Menu;
use App\User;
use App\Ingredient;
use File;
use DB;
use Auth;
class AdministratorController extends Controller
{
    public function graphPage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('admin.graph')->render();

    }

    public function ingredientPage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('admin.ingredient')->render();

    }

    public function menuPage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('admin.menu')->render();

    }

    public function clientPage(){

        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('admin.client')->render();

    }

    public function loadUser(Request $request){
        $user = User::get();
        return Datatables::of($user)
            ->addColumn('id', function ($data) use ($request){
                return $data->id;
            })
            ->addColumn('name', function ($data) use ($request){
                return $data->name;
            })
            ->addColumn('email', function ($data) use ($request){
                return $data->email;
            })
            ->addColumn('user_type', function ($data) use ($request){
                return config('constant.user_'.$data->user_type);
            })
            ->make(true);
    }


    public function loadMenu(Request $request){
        $menu= Menu::get();
        return Datatables::of($menu)
            ->addColumn('x', function ($data) use ($request){
                return '<div class="remove-data">x</div>';
            })
            ->addColumn('img', function ($data) use ($request){
                return "<div class='box-menu'><img src=".url($data->menu_file)." height='100%' width='100%'></div>";
            })
            ->addColumn('id', function ($data) use ($request){
                return $data->id;
            })
            ->addColumn('name', function ($data) use ($request){
                return $data->name;
            })
            ->addColumn('price', function ($data) use ($request){
                return $data->price;
            })
            ->addColumn('status', function ($data) use ($request){
                $stat = ($data->status == 1) ? 'available-menu' : 'notavailable-menu';
                return "<span class=".$stat.">".config('constant.menu_stat_'.$data->status)."</span>";
            })
            ->addColumn('action', function ($data) use ($request){
                return '<button class="btn btn-xs btn-view" data-id="'.$data->id.'">View</button>';
            })
            ->make(true);
    }

    public function loadIngredient(Request $request){
        $ingredient = Ingredient::get();
        return Datatables::of($ingredient)
            ->addColumn('x', function ($data) use ($request){
                return '<div class="remove-data">x</div>';
            })
            ->addColumn('id', function ($data) use ($request){
                return $data->id;
            })
            ->addColumn('name', function ($data) use ($request){
                return $data->name;
            })
            ->addColumn('quantity', function ($data) use ($request){
                return $data->quantity;
            })
            ->addColumn('action', function ($data) use ($request){
                return '<button class="btn btn-xs btn-view" data-id="'.$data->id.'">View</button>';
            })
            ->make(true);
    }

    public function addMenu(Request $request){

        //UPLOAD
        $path = 'images';
        try {
            $extension = $request->file->getClientOriginalExtension();
            $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $extension;
            $new_filename = round(microtime(true)) . '.' . $extension;
            $request->file->move($path, $new_filename);
        } catch (\Exception $ex) {
            $extension = $request->file->getClientOriginalExtension();
            $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $extension;
            $new_filename = round(microtime(true)) . '.' . $extension;
            $request->file->move($path, $new_filename);
        }
        //UPLOAD

        $insert = new Menu();
        $insert->name = $request->name1;
        $insert->price = $request->name2;
        $insert->status = $request->name3;
        $insert->menu_file = 'images\\'.$new_filename;
        $insert->save();

        return $request->all();
    }

    public function loadGraph(Request $request){
        $data = Transaction::select([
            DB::raw('transaction_date AS date'),
            DB::raw('sum(total) AS sum'),
        ])
            ->whereBetween('transaction_date', [$request->from, $request->to])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $array_data = [];
        $array_data1 =[];

        foreach ($data as $total){
            $array_data[] = $total->sum;
            $array_data1[] = $total->date;
        }

        $all_data =[
            'total' =>$array_data,
            'transaction_date' =>$array_data1,
        ];

        return $all_data;
    }

    public function addIngredient(Request $request){

        $addingredient = new Ingredient();
        $addingredient->name  = $request->name1;
        $addingredient->quantity  = $request->name2;
        $addingredient->save();

        return 'success';
    }

    public function viewMenu(Request $request){
        $menu = Menu::where('id',$request->id)->first();
        $data = [
            'data' => $menu
        ];
        $theme = Theme::uses('default')->layout('default')->setTitle('');
        return $theme->scope('admin.single_menu',$data)->render();
    }

    public function updateMenu(Request $request){




        $updateMenu = Menu::find($request->id);
        $updateMenu->name = $request->name1;
        $updateMenu->price = $request->name2;
        $updateMenu->status = $request->name3;

        if($request->empty !== ''){
            //UPLOAD
            $path = 'images';
            try {
                $extension = $request->file->getClientOriginalExtension();
                $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $extension;
                $new_filename = round(microtime(true)) . '.' . $extension;
                $request->file->move($path, $new_filename);
            } catch (\Exception $ex) {
                $extension = $request->file->getClientOriginalExtension();
                $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $extension;
                $new_filename = round(microtime(true)) . '.' . $extension;
                $request->file->move($path, $new_filename);
            }
            //UPLOAD
            File::delete($request->file_data);
            $updateMenu->menu_file = 'images\\'.$new_filename;
        }

        $updateMenu->update();

        return 'success';
    }

}
