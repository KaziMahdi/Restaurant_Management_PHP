<?php
if(isset($_POST["btnEdit"])){
	$stockadjustment=StockAdjustment::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUserId"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbAdjustmentTypeId"])){
		$errors["adjustment_type_id"]="Invalid adjustment_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbWerehouseId"])){
		$errors["werehouse_id"]="Invalid werehouse_id";
	}

*/
	if(count($errors)==0){
		$stockadjustment=new StockAdjustment();
		$stockadjustment->id=$_POST["txtId"];
		$stockadjustment->adjustment_at=$now;
		$stockadjustment->user_id=$_POST["cmbUserId"];
		$stockadjustment->remark=$_POST["txtRemark"];
		$stockadjustment->adjustment_type_id=$_POST["cmbAdjustmentTypeId"];
		$stockadjustment->werehouse_id=$_POST["cmbWerehouseId"];

		$stockadjustment->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustments">Manage StockAdjustment</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-stockadjustment' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$stockadjustment->id"]);
	$html.=select_field(["label"=>"User","name"=>"cmbUserId","table"=>"users","value"=>"$stockadjustment->user_id"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$stockadjustment->remark"]);
	$html.=select_field(["label"=>"Adjustment Type","name"=>"cmbAdjustmentTypeId","table"=>"adjustment_types","value"=>"$stockadjustment->adjustment_type_id"]);
	$html.=select_field(["label"=>"Werehouse","name"=>"cmbWerehouseId","table"=>"werehouses","value"=>"$stockadjustment->werehouse_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
