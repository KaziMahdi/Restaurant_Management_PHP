<?php

class OrderApi{


  function index(){
		echo json_encode(["orders"=>Order::all()]);
	}

  static function save($data){  

   
    $order_date=$data["order_date"];
    $due_date=$data["delivery_date"];   
    $order_date=date("Y-m-d",strtotime($order_date));//convert date into mysql format
    $due_date=date("Y-m-d",strtotime($due_date));//convert date into mysql format

    $menus=$data["menus"];
       
    $order=new Order();  
		$order->customer_id=$data["customer_id"];
    $order->booking_id=$data["booking_id"];
		$order->order_date=$order_date;
		$order->delivery_date=$due_date;
		$order->shipping_address=$data["shipping_address"];
		$order->order_total=$data["order_total"];		
		$order->remark=$data["remark"];
		$order->status_id=1;
		$order->discount=$data["discount"];
		$order->vat=$data["vat"];

    $order_id=$order->save();  
    
    $now=date("Y-m-d H:i:s"); 

    foreach($menus as $menu){
      $orderdetails=new OrderDetail();
      
      $orderdetails->order_id=$order_id;
      $orderdetails->menu_id=$menu["item_id"];
      $orderdetails->qty=$menu["qty"];
      $orderdetails->price=$menu["price"];
      $orderdetails->vat=0;
      $orderdetails->discount=$menu["discount"];
      $orderdetails->save();
      
      // $stock=new Stock();//1 for sales order      
      // $stock->menu_id=$menu["item_id"];
      // $stock->qty=-$menu["qty"];
      // $stock->transaction_type_id=1;//1 for sales, 2 
      // $stock->remark="Order";
      // $stock->save();
    }

   
    echo json_encode(["status" => "success"]);
  
  

  }//end function
   
}//end class
?>