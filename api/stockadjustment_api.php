<?php
class StockAdjustmentApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stock_adjustments"=>StockAdjustment::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stock_adjustments"=>StockAdjustment::pagination($page,$perpage),"total_records"=>StockAdjustment::count()]);
	}
	function find($data){
		echo json_encode(["stockadjustment"=>StockAdjustment::find($data["id"])]);
	}
	function delete($data){
		StockAdjustment::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$adjustment_at=isset($data["txtAdjustmentDate"])?$data["txtAdjustmentDate"]:date("y-m-d");    
    

    $adjustment_at=date("Y-m-d",strtotime($adjustment_at));//convert date into mysql format
    


		$stockadjustment=new StockAdjustment();
		$stockadjustment->user_id=$data["cmbUser"];
		$stockadjustment->adjustment_at=$adjustment_at;
		$stockadjustment->remark=$data["txtRemark"];
		$stockadjustment->adjustment_type_id=$data["txtAdjustmentType"];
		$stockadjustment->werehouse_id=$data["cmbWarehouse"];

		$adjustment_id=$stockadjustment->save();

		$adjustDetails=$data["txtProducts"];

		foreach($adjustDetails as $adjustDetail){

			$detailsAdjustment=new StockAdjustmentDetail();

			$detailsAdjustment->adjustment_id=$adjustment_id;
			$detailsAdjustment->material_id=$adjustDetail["item_id"];
			$detailsAdjustment->price=$adjustDetail["price"];
			$detailsAdjustment->measure=$adjustDetail["measure"];
			$detailsAdjustment->uom_Id=$adjustDetail["uom_id"];

			$detailsAdjustment->save();


		}


		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$stockadjustment=new StockAdjustment();
		$stockadjustment->id=$data["id"];
		$stockadjustment->user_id=$data["user_id"];
		$stockadjustment->remark=$data["remark"];
		$stockadjustment->adjustment_type_id=$data["adjustment_type_id"];
		$stockadjustment->werehouse_id=$data["werehouse_id"];

		$stockadjustment->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
