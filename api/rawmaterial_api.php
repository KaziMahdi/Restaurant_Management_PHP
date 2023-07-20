<?php
class RawmaterialApi{
       
	public function __construct(){
		// if(!is_token_valid()){ 
		// 	echo json_encode(["error"=>"Invalid Token"]);
		// 	exit();  
		// }
	}	

	function index(){		
		  echo json_encode(["materials"=>RawMaterial::all()]);		
	}

	function pagination($data){
		
		if(is_valid($data["token"])){
			$page=$data["page"];
			$perpage=$data["perpage"];		
			echo json_encode(["materials"=>RawMaterial::pagination($page,$perpage),"total_records"=>RawMaterial::count(),"success"=>1]);
		}else{
			echo json_encode(["error"=>"Invalid Token"]);
		}

	}

	function find($data){
		echo json_encode(["materials"=>RawMaterial::find($data["id"])]);
	}
	function delete($data){
		RawMaterial::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$material=new RawMaterial();
		$material->r_name=$data["name"];
		$material->price=$data["price"];
		$material->measure=$data["measure"];
		$material->uom_id=$data["uom_id"];
		

		$material->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$material=new RawMaterial();
		$material->id=$data["id"];
		$material->r_name=$data["name"];
		$material->price=$data["price"];
		$material->measure=$data["measure"];
		$material->uom_id=$data["uom_id"];	

		$material->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
