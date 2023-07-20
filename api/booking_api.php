<?php
class BookingApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["bookings"=>Booking::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["bookings"=>Booking::pagination($page,$perpage),"total_records"=>Booking::count()]);
	}
	function find($data){
		echo json_encode(["booking"=>Booking::find($data["id"])]);
	}
	function delete($data){
		Booking::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$booking=new Booking();
		$booking->id=$data["id"];
		$booking->name=$data["name"];
		$booking->mobile=$data["mobile"];
		$booking->email=$data["email"];

		$booking->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$booking=new Booking();
		$booking->id=$data["id"];
		$booking->id=$data["id"];
		$booking->name=$data["name"];
		$booking->mobile=$data["mobile"];
		$booking->email=$data["email"];

		$booking->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
