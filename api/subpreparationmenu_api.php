<?php
class SubPreparationmenuApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["sub_preparationmenus"=>SubPreparationmenu::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["sub_preparationmenus"=>SubPreparationmenu::pagination($page,$perpage),"total_records"=>SubPreparationmenu::count()]);
	}
	function find($data){
		echo json_encode(["subpreparationmenu"=>SubPreparationmenu::find($data["id"])]);
	}
	function delete($data){
		SubPreparationmenu::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$subpreparationmenu=new SubPreparationmenu();
		$subpreparationmenu->name=$data["name"];

		$subpreparationmenu->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$subpreparationmenu=new SubPreparationmenu();
		$subpreparationmenu->id=$data["id"];
		$subpreparationmenu->name=$data["name"];

		$subpreparationmenu->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
