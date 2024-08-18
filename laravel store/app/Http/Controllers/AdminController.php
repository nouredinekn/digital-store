<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(Request  $r)
	{
		$user_admin = $r->user_admin;
        $password_admin = $r->password_admin;
        $check_by_email=db::select("select * from admin where email_admin='$user_admin' and password_admin='$password_admin'");	
        $check_by_user=db::select("select * from admin where user_admin='$user_admin' and password_admin='$password_admin'");	
        $data=db::select("select * from catalogue;");
        $data1=db::select("select * from product;");	
        $info=db::select("select * from  info_product;");	
        if ($check_by_email || $check_by_user ){
return view('admin/dashboard',compact('data','data1','info'));

    }

else{
    return view('admin/admin');
}


    }

public function sendids(Request  $r){
    
    $data=db::select("select * from catalogue;");	
	return view('layouts/ajoute',compact('data'));


}
public function welcome(){
    	
	return view('welcome');


}

public function orders(Request  $r){
    $confirmed=db::select("select * from  order_product where order_status='confirmed';");
    $noconfirmed=db::select("select * from  order_product where order_status='no confirmed';");
	return view('layouts/orders',compact('confirmed','noconfirmed'));


}
}
