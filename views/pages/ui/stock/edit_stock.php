<?php
if(isset($_POST["btnEdit"])){
	$stock=Stock::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbMaterialId"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbWarehouseId"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}

*/
	if(count($errors)==0){
		$stock=new Stock();
		$stock->id=$_POST["txtId"];
		$stock->material_id=$_POST["cmbMaterialId"];
		$stock->qty=$_POST["txtQty"];
		$stock->remark=$_POST["txtRemark"];
		$stock->created_at=$now;
		$stock->warehouse_id=$_POST["cmbWarehouseId"];

		$stock->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stocks">Manage Stock</a>
<form class='form-horizontal' action='edit-stock' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$stock->id"]);
	$html.=select_field(["label"=>"Material","name"=>"cmbMaterialId","table"=>"materials","value"=>"$stock->material_id"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$stock->qty"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$stock->remark"]);
	$html.=select_field(["label"=>"Warehouse","name"=>"cmbWarehouseId","table"=>"warehouses","value"=>"$stock->warehouse_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
