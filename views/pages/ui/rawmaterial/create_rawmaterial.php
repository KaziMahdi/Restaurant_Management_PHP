<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRName"])){
		$errors["r_name"]="Invalid r_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMeasure"])){
		$errors["measure"]="Invalid measure";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}

*/
	if(count($errors)==0){
		$rawmaterial=new RawMaterial();
		$rawmaterial->r_name=$_POST["txtRName"];
		$rawmaterial->price=$_POST["txtPrice"];
		$rawmaterial->measure=$_POST["txtMeasure"];
		$rawmaterial->uom_id=$_POST["cmbUomId"];

		$rawmaterial->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="raw_materials">Manage RawMaterial</a>
<form class='form-horizontal' action='create-rawmaterial' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"R Name","type"=>"text","name"=>"txtRName"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice"]);
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
