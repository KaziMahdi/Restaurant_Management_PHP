<?php
if(isset($_POST["btnEdit"])){
	$requisition=Requisition::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCreatedDate"])){
		$errors["created_date"]="Invalid created_date";
	}

*/
	if(count($errors)==0){
		$requisition=new Requisition();
		$requisition->id=$_POST["txtId"];
		$requisition->name=$_POST["txtName"];
		$requisition->price=$_POST["txtPrice"];
		$requisition->qty=$_POST["cmbQty"];
		$requisition->uom_id=$_POST["cmbUomId"];
		$requisition->created_date=$_POST["txtCreatedDate"];

		$requisition->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="requisitions">Manage Requisition</a>
<form class='form-horizontal' action='edit-requisition' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$requisition->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$requisition->name"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice","value"=>"$requisition->price"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$requisition->qty"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom","value"=>"$requisition->uom_id"]);
	$html.=input_field(["label"=>"Created Date","type"=>"text","name"=>"txtCreatedDate","value"=>"$requisition->created_date"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
