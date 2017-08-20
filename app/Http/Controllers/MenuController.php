<?php

namespace App\Http\Controllers;



use App\Menu;
use App\MenuList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function getMenu(){
        $menu = Menu::all();
        return json_encode($menu);

    }

    public function getMenuList(Request $request){
        $menuList = MenuList::where('menu_id',$request->menu_id)->get();
        return json_encode($menuList);

    }

    public function loginWaiter(Request $request){
        if (Auth::attempt(['email' =>$request->email, 'password' => $request->password,'user_type'=>4])) {
            $message = [
                'isLogin' => 1,
                'id' => Auth::user()->id,
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'address' => Auth::user()->address,
                'contact' => Auth::user()->contact,
                'email' => Auth::user()->email,
            ];
        }else{
            $message['isLogin'] = 0;
        }

        return json_encode($message);
    }


    public function createWaiter(Request $request){

        $createUser =  User::insert(
            ['first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => 4]);

        if($createUser){
            $message['message'] = "Account successfully created";
        }else{
            $message['message'] = "Error occurred";
        }

        return json_encode($message);

    }

    public function updateWaiter(Request $request){


        if($request->password != "" || !empty($request->password)){


            $updateUser =  User::where('id',$request->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'contact' => $request->contact,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

        }else{

            $updateUser =  User::where('id',$request->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'contact' => $request->contact,
                'email' => $request->email,
            ]);

        }


        $user = User::find($request->id);

        if($updateUser){
            $message = [
                'success' => 1,
                'message' => "Account successfully updated",
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'address' => $user->address,
                'contact' => $user->contact,
                'email' => $user->email,
            ];
        }else{
            $message['success'] = 0;
            $message['message'] = "Error occurred";
        }

        return json_encode($message);

    }

    public function getTable(){
        $table = DB::table('restaurant_table')->get();
        return json_encode($table);
    }

    public function getCart(Request $request){
        $order_id = 1;
        $table = DB::table('order_items')
            ->join('menus_list','order_items.product_id','menus_list.id')
            ->select('order_items.quantity','menus_list.id','menus_list.food_name')
            ->where('order_items.order_id',$order_id)
            ->get();
        return json_encode($table);
    }

    public function getTemporaryCart(Request $request){

        $order_id = 1;
        $table = DB::table('order_items')
            ->join('menus_list','order_items.product_id','menus_list.id')
            ->select('order_items.quantity','menus_list.id','menus_list.food_name')
            ->where('order_items.order_id',$order_id)
            ->get();
        return json_encode($table);

    }
	
	public function insertOrder(Request $request){

        $data["data"] = $request->cartList;
        return json_encode($data);


    }

}
