<?php
if(isset($_POST["btnEdit"])){
	$stockadjustmenttype=StockAdjustmentType::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
	if(count($errors)==0){
		$stockadjustmenttype=new StockAdjustmentType();
		$stockadjustmenttype->id=$_POST["txtId"];
		$stockadjustmenttype->name=$_POST["txtName"];

		$stockadjustmenttype->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustment_types">Manage StockAdjustmentType</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='edit-stockadjustmenttype' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$stockadjustmenttype->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$stockadjustmenttype->name"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
