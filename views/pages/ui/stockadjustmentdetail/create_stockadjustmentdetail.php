<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbAdjustmentId"])){
		$errors["adjustment_id"]="Invalid adjustment_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbVarietyId"])){
		$errors["variety_id"]="Invalid variety_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}

*/
	if(count($errors)==0){
		$stockadjustmentdetail=new StockAdjustmentDetail();
		$stockadjustmentdetail->adjustment_id=$_POST["cmbAdjustmentId"];
		$stockadjustmentdetail->variety_id=$_POST["cmbVarietyId"];
		$stockadjustmentdetail->qty=$_POST["txtQty"];
		$stockadjustmentdetail->price=$_POST["txtPrice"];

		$stockadjustmentdetail->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustment_details">Manage StockAdjustmentDetail</a>
<form class='form-horizontal' action='create-stockadjustmentdetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Adjustment","name"=>"cmbAdjustmentId","table"=>"adjustments"]);
	$html.=select_field(["label"=>"Variety","name"=>"cmbVarietyId","table"=>"varietys"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
