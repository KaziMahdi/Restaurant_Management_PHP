<?php
if(isset($_POST["btnEdit"])){
	$expenstiondetaile=ExpenstionDetaile::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbExpenstionId"])){
		$errors["expenstion_id"]="Invalid expenstion_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbMaterialId"])){
		$errors["material_id"]="Invalid material_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMeasure"])){
		$errors["measure"]="Invalid measure";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}

*/
	if(count($errors)==0){
		$expenstiondetaile=new ExpenstionDetaile();
		$expenstiondetaile->id=$_POST["txtId"];
		$expenstiondetaile->expenstion_id=$_POST["cmbExpenstionId"];
		$expenstiondetaile->material_id=$_POST["cmbMaterialId"];
		$expenstiondetaile->measure=$_POST["cmbMeasure"];
		$expenstiondetaile->uom_id=$_POST["cmbUomId"];

		$expenstiondetaile->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="expenstion_detailes">Manage ExpenstionDetaile</a>
<form class='form-horizontal' action='edit-expenstiondetaile' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$expenstiondetaile->id"]);
	$html.=select_field(["label"=>"Expenstion","name"=>"cmbExpenstionId","table"=>"expenstions","value"=>"$expenstiondetaile->expenstion_id"]);
	$html.=select_field(["label"=>"Material","name"=>"cmbMaterialId","table"=>"materials","value"=>"$expenstiondetaile->material_id"]);
	$html.=input_field(["label"=>"Measure","type"=>"text","name"=>"txtMeasure","value"=>"$expenstiondetaile->measure"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom","value"=>"$expenstiondetaile->uom_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
