<?php
if(isset($_POST["btnCreate"])){
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
		$expenstiondetaile->expenstion_id=$_POST["cmbExpenstionId"];
		$expenstiondetaile->material_id=$_POST["cmbMaterialId"];
		$expenstiondetaile->measure=$_POST["txtMeasure"];
		$expenstiondetaile->uom_id=$_POST["cmbUomId"];

		$expenstiondetaile->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="expenstion_detailes">Manage ExpenstionDetaile</a>
<form class='form-horizontal' action='create-expenstiondetaile' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Expenstion","name"=>"cmbExpenstionId","table"=>"expenstions"]);
	$html.=select_field(["label"=>"Material","name"=>"cmbMaterialId","table"=>"materials"]);
	$html.=input_field(["label"=>"Measure","type"=>"text","name"=>"txtMeasure"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
