<?php
class ExpenstionDetaileApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["expenstion_detailes"=>ExpenstionDetaile::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["expenstion_detailes"=>ExpenstionDetaile::pagination($page,$perpage),"total_records"=>ExpenstionDetaile::count()]);
	}
	function find($data){
		echo json_encode(["expenstiondetaile"=>ExpenstionDetaile::find($data["id"])]);
	}
	function delete($data){
		ExpenstionDetaile::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$expenstiondetaile=new ExpenstionDetaile();
		$expenstiondetaile->expenstion_id=$data["expenstion_id"];
		$expenstiondetaile->material_id=$data["material_id"];
		$expenstiondetaile->measure=$data["measure"];
		$expenstiondetaile->uom_id=$data["uom_id"];

		$expenstiondetaile->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$expenstiondetaile=new ExpenstionDetaile();
		$expenstiondetaile->id=$data["id"];
		$expenstiondetaile->expenstion_id=$data["expenstion_id"];
		$expenstiondetaile->material_id=$data["material_id"];
		$expenstiondetaile->measure=$data["measure"];
		$expenstiondetaile->uom_id=$data["uom_id"];

		$expenstiondetaile->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
