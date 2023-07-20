<?php
class TestApi{
static function save($data){
    $purchasedetails=new PurchaseDetail();
      
    $purchasedetails->purchase_id=$data["id"];
    $purchasedetails->material_id=$data["material_id"];
    $purchasedetails->measure=$data["measure"];
    $purchasedetails->uom_id=$data["uom_id"];
    $purchasedetails->price=$data["price"];
    $purchasedetails->vat=0;
    $purchasedetails->discount=$data["discount"];
    $purchasedetails->save();
    echo json_encode(["status" => "success"]);
}
}
?>