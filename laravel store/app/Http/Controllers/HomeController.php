<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    public function index(Request  $r)
    {
	     $data=db::select("select * from catalogue;");
         $data1=db::select("select * from product;");	
         $info=db::select("select * from  info_product;");	
         $confirmed=db::select("select * from  order_product where order_status='confirmed';");
         $noconfirmed=db::select("select * from  order_product where order_status='no confirmed';");
       return view('home',compact('data','data1','info','confirmed','noconfirmed'));
    }
    
}
