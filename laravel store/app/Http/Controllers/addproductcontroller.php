<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class addproductcontroller extends Controller
{  public function addcatalogue(Request  $r)
	{
        $name_catalogue = $r->name_catalogue;
        db::insert("INSERT INTO catalogue(`name`) VALUES ('$name_catalogue');");
       return  redirect('getshowcatalogue');
    
    }



    public function addproduct(Request  $r)
	{
		$name_product = $r->name_product;
        $product_description = $r->product_description;
        $price_product= $r->price_product;
        $image_product = $r->file('image_product');
        $id_catalogue=$r->id_catalogue;
        $ext_p_img=$image_product->getClientOriginalExtension();
        if ($ext_p_img=='png'||$ext_p_img=='jpeg'||$ext_p_img=='jpg'){
            
            $fixedName=pathinfo($image_product->getClientOriginalName(), PATHINFO_FILENAME).mt_rand(1, 10000).'.'.$ext_p_img;
            $save_image=$image_product->move(public_path('product_images'),$fixedName);
            
            db::insert("
        INSERT INTO `product`
         (`id`, `name_product`, `image_product`, `price_product`, `id_catalogue`, `product_description`) 
         VALUES (NULL, '$name_product', '$fixedName', '$price_product', '$id_catalogue', '$product_description');");
        $data=db::select("select * from catalogue;");
        $data1=db::select("select * from product;");	
        $info=db::select("select * from  info_product;");	
   
        return  redirect('getshowproduct');
        }
        
            else{
            
                return view('admin/dashboard');


        }

    }
    public function addinfoproduct(Request  $r)
	{
        $id_product=$r->id_product;
        $info_product=$r->info_product;
        db::insert("
        INSERT INTO
        `info_product` (`info_product`,`id_product`)
        VALUES ('$info_product','$id_product')
        ");
        return  redirect('getshowinfoproduct');

        }
        public function getaddinfoproduct(Request  $r)
	{   $data=db::select("select * from catalogue;");
        $data1=db::select("select * from product;");
        return view('layouts/addinfoproduct',compact('data'),compact('data1'));
        }

        public function getcatalogue(Request  $r)
        {   $data=db::select("select * from catalogue;");
            $data1=db::select("select * from product;");
            return view('layouts/catalogues',compact('data'),compact('data1'));
            }
            public function getshowcatalogue(Request  $r)
            {   $data=db::select("select * from catalogue;");
                $data1=db::select("select * from product;");
                return view('layouts/showcatalogues',compact('data'),compact('data1'));
                }
                public function getshowproduct(Request  $r)
            {   $data=db::select("select * from catalogue;");
                $data1=db::select("select * from product;");
                return view('layouts/showproduct',compact('data'),compact('data1'));
                }
                public function getshowinfoproduct(Request  $r)
            {   $data=db::select("select * from catalogue;");
                $data1=db::select("select * from product;");	
                $info=db::select("select * from  info_product;");	
        return view('layouts/showinfoproduct',compact('data','data1','info'));
          //deletecatalogue   
           
    }
    public function deletecatalogue($id) {
        $dl=DB::delete("delete from  `catalogue` WHERE id_catalogue=$id;");
        return redirect('/getshowcatalogue');
         

}
public function deletepd($id) {
    $dl=DB::delete("delete from  `product` WHERE id=$id;");
    return redirect('/getshowproduct');
     

}
public function deleteinf($id) {
    $dl=DB::delete("delete from  `info_product` WHERE id=$id;");
    return redirect('/getshowinfoproduct');
     

}

public function modifiercataloguet($id) {
    $data=db::select("select * from catalogue where id_catalogue= $id ;")[0];

    return view('layouts/editcatalogues',compact('data'),['id' => $id]);
}



public function updatecataloguet(Request  $r)
	{
		$id = $r->id;
        $name_catalogue = $r->name_catalogue;
        db::update("update catalogue set name='$name_catalogue' where id_catalogue=$id;");
        return redirect('/getshowcatalogue');
    

}
public function modifierinfpd($id) {
    $data=db::select("select * from catalogue;");
    $data1=db::select("select * from product;");	
    $info=db::select("select * from  info_product where id=$id;")[0];	
    return view('layouts/editinfoproduct',compact('data','data1','info'),['id' => $id]);
    }

    public function updateinfoproduct(Request  $r) {
        $id_product=$r->id_product;
        $info_product=$r->info_product;
        $id=$r->id;
        $status=$r->status;
        db::update("
            update
          `info_product` set `info_product`='$info_product' , 
          `id_product`='$id_product' , status='$status'  where id=$id;

        ");
        return  redirect('getshowinfoproduct');   }
    


public function modifierproduct($id) {
    $data=db::select("select * from catalogue;");
    $data1=db::select("select * from product where id=$id;")[0];

        return view('layouts/editproduct',compact('data','data1'),['id' => $id]);
    }
    
    


    public function updateproduct(Request  $r)
	{
		$id = $r->id;
        $name_product = $r->name_product;
        $product_description = $r->product_description;
        $price_product= $r->price_product;
        $image_product = $r->file('image_product');
        $id_catalogue=$r->id_catalogue;
        $ext_p_img=$image_product->getClientOriginalExtension();
        if ($ext_p_img=='png'||$ext_p_img=='jpeg'||$ext_p_img=='jpg'){
            
            $fixedName=pathinfo($image_product->getClientOriginalName(), PATHINFO_FILENAME).mt_rand(1, 10000).'.'.$ext_p_img;
            $save_image=$image_product->move(public_path('product_images'),$fixedName);
            
            db::update("
            update `product`set
           `name_product` ='$name_product',
          `image_product`= '$fixedName',
           `price_product`='$price_product', 
           `id_catalogue`='$id_catalogue', 
           `product_description` ='$product_description' where  id=$id
        ;");
        $data=db::select("select * from catalogue;");
        $data1=db::select("select * from product;");	
        $info=db::select("select * from  info_product;");	
   
        return  redirect('getshowproduct');
        }

            else{
            
                return view('admin/dashboard');


        }
       
        return redirect('/getshowcatalogue');
    

}
public function createorder(Request  $r){
        $idproduct=$r->id;
        $stock=db::select("SELECT count(id) as cnt FROM `info_product` WHERE id_product=$idproduct and status='unsold' ");
        $stockid=$stock[0]->cnt;
        $pro=db::select("SELECT * FROM `product` WHERE id=$idproduct ;");
         return view('layouts/createorder',['idproduct'=> $idproduct,'stock'=>$stock,'stockid'=>$stockid ],compact('pro'))     ;

}


public function getinfoorder(Request  $r)
{
    $emailorder=$r->emailorder;
    $idproduct=$r->idproduct;
    $stockid=$r->stockid;
    $name_product=$r->name_product;
    $info=db::select("select info_product from  info_product where id_product=$idproduct and status='unsold';;")[0]->info_product;
    $idinfo=db::select("select id from  info_product where id_product=$idproduct and status='unsold'; ")[0]->id;
    $createorder=db::insert("INSERT INTO order_product(`id`, `product_info`, `order_status`,`emailorder`,`name_product`,`idinfo`) VALUES (NULL ,'$info', 'no confirmed','$emailorder','$name_product',$idinfo);");
    return redirect('/home');

}

public function confirmeproduct(Request  $r){
    $idorder=$r->id;
    db::update("UPDATE `order_product` set order_status='confirmed' WHERE id=$idorder");
    return redirect('/orders'); ;
}
public function deleteorders(Request  $r){
    $idorder=$r->id;
    db::delete("delete from `order_product`  WHERE id=$idorder");
    return redirect('/orders'); ;
}
public function deleteordersfromuser(Request  $r){
    $idorder=$r->id;
    db::delete("delete from `order_product`  WHERE id=$idorder");
    return redirect('/home'); ;
}
}
