<?php
if(isset($_POST["btnEdit"])){
	$orderdetail=OrderDetail::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbOrderId"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbMenuId"])){
		$errors["menu_id"]="Invalid menu_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtQty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPrice"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtVat"])){
		$errors["vat"]="Invalid vat";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDiscount"])){
		$errors["discount"]="Invalid discount";
	}

*/
	if(count($errors)==0){
		$orderdetail=new OrderDetail();
		$orderdetail->id=$_POST["txtId"];
		$orderdetail->order_id=$_POST["cmbOrderId"];
		$orderdetail->menu_id=$_POST["cmbMenuId"];
		$orderdetail->qty=$_POST["txtQty"];
		$orderdetail->price=$_POST["txtPrice"];
		$orderdetail->vat=$_POST["txtVat"];
		$orderdetail->discount=$_POST["txtDiscount"];
		$orderdetail->created_at=$now;
		$orderdetail->updated_at=$now;

		$orderdetail->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="order_details">Manage OrderDetail</a>
<form class='form-horizontal' action='edit-orderdetail' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$orderdetail->id"]);
	$html.=select_field(["label"=>"Order","name"=>"cmbOrderId","table"=>"orders","value"=>"$orderdetail->order_id"]);
	$html.=select_field(["label"=>"Menu","name"=>"cmbMenuId","table"=>"menus","value"=>"$orderdetail->menu_id"]);
	$html.=input_field(["label"=>"Qty","type"=>"text","name"=>"txtQty","value"=>"$orderdetail->qty"]);
	$html.=input_field(["label"=>"Price","type"=>"text","name"=>"txtPrice","value"=>"$orderdetail->price"]);
	$html.=input_field(["label"=>"Vat","type"=>"text","name"=>"txtVat","value"=>"$orderdetail->vat"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount","value"=>"$orderdetail->discount"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
