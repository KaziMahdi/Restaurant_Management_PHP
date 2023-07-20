<?php
class OrderDetail{
	public function __construct(){
	}
	function index(){
		echo json_encode(["order_details"=>OrderDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["order_details"=>OrderDetail::pagination($page,$perpage),"total_records"=>OrderDetail::count()]);
	}
	function find($data){
		echo json_encode(["OrderDetail"=>OrderDetail::find($data["id"])]);
	}
	function delete($data){
		OrderDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$OrderDetail=new OrderDetail();
		$OrderDetail->order_id=$data["order_id"];
		$OrderDetail->menu_id=$data["menu_id"];
		$OrderDetail->qty=$data["qty"];
		$OrderDetail->price=$data["price"];
		$OrderDetail->vat=$data["vat"];
		$OrderDetail->discount=$data["discount"];

		$OrderDetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$OrderDetail=new OrderDetail();
		$OrderDetail->id=$data["id"];
		$OrderDetail->order_id=$data["order_id"];
		$OrderDetail->menu_id=$data["menu_id"];
		$OrderDetail->qty=$data["qty"];
		$OrderDetail->price=$data["price"];
		$OrderDetail->vat=$data["vat"];
		$OrderDetail->discount=$data["discount"];

		$OrderDetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
