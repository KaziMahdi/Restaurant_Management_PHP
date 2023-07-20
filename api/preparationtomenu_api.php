<?php
class PreparationToMenuApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["preparation_to_menus"=>PreparationToMenu::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["preparation_to_menus"=>PreparationToMenu::pagination($page,$perpage),"total_records"=>PreparationToMenu::count()]);
	}
	function find($data){
		echo json_encode(["preparationtomenu"=>PreparationToMenu::find($data["id"])]);
	}
	function delete($data){
		PreparationToMenu::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$preparationtomenu=new PreparationToMenu();
		$preparationtomenu->menu_id=$data["menu_id"];
		$preparationtomenu->sub_preparation_id=$data["sub_preparation_id"];
		$preparationtomenu->mesure=$data["mesure"];
		$preparationtomenu->uom_id=$data["uom_id"];
		$preparationtomenu->pic=$data["pic"];

		$preparationtomenu->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$preparationtomenu=new PreparationToMenu();
		$preparationtomenu->id=$data["id"];
		$preparationtomenu->menu_id=$data["menu_id"];
		$preparationtomenu->sub_preparation_id=$data["sub_preparation_id"];
		$preparationtomenu->mesure=$data["mesure"];
		$preparationtomenu->uom_id=$data["uom_id"];
		$preparationtomenu->pic=$data["pic"];

		$preparationtomenu->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
