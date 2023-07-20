<?php
class MenuApi{
       
	public function __construct(){
		// if(!is_token_valid()){ 
		// 	echo json_encode(["error"=>"Invalid Token"]);
		// 	exit();  
		// }
	}	

	function index(){		
		  echo json_encode(["menus"=>menu::all()]);		
	}

	function pagination($data){
		
		if(is_valid($data["token"])){
			$page=$data["page"];
			$perpage=$data["perpage"];		
			echo json_encode(["menus"=>menu::pagination($page,$perpage),"total_records"=>menu::count(),"success"=>1]);
		}else{
			echo json_encode(["error"=>"Invalid Token"]);
		}

	}

	function find($data){
		echo json_encode(["menu"=>menu::find($data["id"])]);
	}
	function delete($data){
		menu::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$menu=new menu();
		$menu->name=$data["name"];
		$menu->offer_price=$data["offer_price"];
		$menu->manufacturer_id=$data["manufacturer_id"];
		$menu->regular_price=$data["regular_price"];
		$menu->description=$data["description"];
		$menu->photo=upload($file["photo"], "../img",$data["name"]);
		$menu->category_id=$data["category_id"];
		$menu->section_id=$data["section_id"];
		$menu->is_featured=$data["is_featured"];
		$menu->star=$data["star"];
		$menu->is_brand=$data["is_brand"];
		$menu->offer_discount=$data["offer_discount"];
		$menu->uom_id=$data["uom_id"];
		$menu->weight=$data["weight"];
		$menu->barcode=$data["barcode"];
		$menu->created_at=$data["created_at"];
		$menu->updated_at=$data["updated_at"];

		$menu->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$menu=new menu();
		$menu->id=$data["id"];
		$menu->name=$data["name"];
		$menu->offer_price=$data["offer_price"];
		$menu->manufacturer_id=$data["manufacturer_id"];
		$menu->regular_price=$data["regular_price"];
		$menu->description=$data["description"];

		if(isset($file["photo"]["name"])){
			$menu->photo=upload($file["photo"], "../img",$data["name"]);
		}else{
			$menu->photo=menu::find($data["id"])->photo;
		}		

		$menu->category_id=$data["category_id"];
		$menu->section_id=$data["section_id"];
		$menu->is_featured=$data["is_featured"];
		$menu->star=$data["star"];
		$menu->is_brand=$data["is_brand"];
		$menu->offer_discount=$data["offer_discount"];
		$menu->uom_id=$data["uom_id"];
		$menu->weight=$data["weight"];
		$menu->barcode=$data["barcode"];	

		$menu->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
