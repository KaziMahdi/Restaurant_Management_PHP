<?php
if(isset($_POST["btnEdit"])){
	$stockadjustmentdetail=StockAdjustmentDetail::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$stockadjustmentdetail->id=$_POST["txtId"];
		$stockadjustmentdetail->adjustment_id=$_POST["cmbAdjustmentId"];
		$stockadjustmentdetail->variety_id=$_POST["cmbVarietyId"];
		$stockadjustmentdetail->qty=$_POST["txtQty"];
		$stockadjustmentdetail->price=$_POST["txtPrice"];

		$stockadjustmentdetail->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustment_details">Manage StockAdjustmentDetail</a>
<form class='form-horizontal' action='edit-stockadjustmentdetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$stockadjustmentdetail->id"]);
	$html.=select_field(["label"=>"Adjustment","name"=>"cmbAdjustmentId","table"=>"adjustments","value"=>"$stockadjustmentdetail->adjustment_id"]);
	$html.=select_field(["label"=>"Variety","name"=>"cmbVarietyId","table"=>"varietys","value"=>"$stockadjustmentdetail->variety_id"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$stockadjustmentdetail->qty"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice","value"=>"$stockadjustmentdetail->price"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
