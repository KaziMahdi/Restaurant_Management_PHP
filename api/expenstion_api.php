<?php
class ExpenstionApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["expenstions"=>Expenstion::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["expenstions"=>Expenstion::pagination($page,$perpage),"total_records"=>Expenstion::count()]);
	}
	function find($data){
		echo json_encode(["expenstion"=>Expenstion::find($data["id"])]);
	}
	function delete($data){
		Expenstion::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){

		$prepare_date=$data["prepare_date"];
    	$sale_date=$data["sale_date"];   
    	$prepare_date=date("Y-m-d",strtotime($prepare_date));
    	$sale_date=date("Y-m-d",strtotime($sale_date));

		
		
		$expenstion=new Expenstion();
		$expenstion->employee_id=$data["employee_id"];
		$expenstion->booking_id=$data["booking_id"];
		$expenstion->prepare_date=$prepare_date;
		$expenstion->sale_date=$sale_date;
		$expenstion->remark=$data["remark"];
		$expenstion->prepare_total=$data["prepare_total"];
		
		
		$expenstion_id=$expenstion->save();

		$now=date("Y-m-d H:i:s");


		$raw_materials=$data["material"];

		foreach($raw_materials as $material){
			$expenstion_details=new ExpenstionDetaile();

			$expenstion_details->expenstion_id=$expenstion_id;
			$expenstion_details->menu_id=$material["item_id"];
			$expenstion_details->material_id=$material["mt_id"];
			$expenstion_details->measure=$material["measure"];
			$expenstion_details->uom_id=$material["uom_id"];
			
			$expenstion_details->save();
			

			$stock=new Stock();

			$stock->material_id=$material["mt_id"];
			$stock->measure=-$material["measure"];
			$stock->uom_id=$material["uom_id"];
			
			$stock->save();



			
		}

		

		echo json_encode(["success" => "yes"]);
	}

}
?>
