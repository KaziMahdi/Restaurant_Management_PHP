<?php

class PurchaseApi{

  static function save($data){  

   
    $purchase_date=$data["purchase_date"];
    $delivery_date=$data["delivery_date"];   

    $purchase_date=date("Y-m-d",strtotime($purchase_date));//convert date into mysql format
    $delivery_date=date("Y-m-d",strtotime($delivery_date));//convert date into mysql format

   
       
    $purchase=new Purchase();  
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->purchase_date=$purchase_date;
		$purchase->delivery_date=$delivery_date;
		$purchase->shipping_address=$data["shipping_address"];
		$purchase->purchase_total=$data["purchase_total"];		
		$purchase->remark=$data["remark"];
		$purchase->status_id=1;
		$purchase->discount=$data["discount"];
		$purchase->vat=$data["vat"];

    $purchase_id=$purchase->save();  
    
    $now=date("Y-m-d H:i:s"); 
    $materials=$data["materials"];
    // print_r($materials);
    foreach($materials as $rawmaterial){
      $purchasedetails=new PurchaseDetail();
      
      $purchasedetails->purchase_id=$purchase_id;
      $purchasedetails->material_id=$rawmaterial["item_id"];
      $purchasedetails->measure=$rawmaterial["measure"];
      $purchasedetails->uom_id=$rawmaterial["uom_id"];
      $purchasedetails->price=$rawmaterial["price"];
      $purchasedetails->vat=0;
      $purchasedetails->discount=$rawmaterial["discount"];
      $purchasedetails->save();
      
      $stock=new Stock();//1 for sales order      
      $stock->material_id=$rawmaterial["item_id"];
      $stock->measure=$rawmaterial["measure"];
      $stock->uom_id=$rawmaterial["uom_id"];
      
      $stock->save();
    }

   
    echo json_encode(["status" => "success"]);
  
  

  }//end function
   
}//end class
?>