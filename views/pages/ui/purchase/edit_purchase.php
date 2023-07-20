<?php
if(isset($_POST["btnEdit"])){
	$purchase=Purchase::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSupplierId"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShippingAddress"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPurchaseTotal"])){
		$errors["purchase_total"]="Invalid purchase_total";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaidAmount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbStatusId"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDiscount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtVat"])){
		$errors["vat"]="Invalid vat";
	}

*/
	if(count($errors)==0){
		$purchase=new Purchase();
		$purchase->id=$_POST["txtId"];
		$purchase->supplier_id=$_POST["cmbSupplierId"];
		$purchase->purchase_date=date("Y-m-d",strtotime($_POST["txtPurchaseDate"]));
		$purchase->delivery_date=date("Y-m-d",strtotime($_POST["txtDeliveryDate"]));
		$purchase->shipping_address=$_POST["txtShippingAddress"];
		$purchase->purchase_total=$_POST["txtPurchaseTotal"];
		$purchase->paid_amount=$_POST["txtPaidAmount"];
		$purchase->remark=$_POST["txtRemark"];
		$purchase->status_id=$_POST["cmbStatusId"];
		$purchase->discount=$_POST["txtDiscount"];
		$purchase->vat=$_POST["txtVat"];

		$purchase->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="purchases">Manage Purchase</a>
<form class='form-horizontal' action='edit-purchase' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$purchase->id"]);
	$html.=select_field(["label"=>"Supplier","name"=>"cmbSupplierId","table"=>"suppliers","value"=>"$purchase->supplier_id"]);
	$html.=input_field(["label"=>"Purchase Date","type"=>"text","name"=>"txtPurchaseDate","value"=>"$purchase->purchase_date"]);
	$html.=input_field(["label"=>"Delivery Date","type"=>"text","name"=>"txtDeliveryDate","value"=>"$purchase->delivery_date"]);
	$html.=input_field(["label"=>"Shipping Address","type"=>"text","name"=>"txtShippingAddress","value"=>"$purchase->shipping_address"]);
	$html.=input_field(["label"=>"Purchase Total","type"=>"text","name"=>"txtPurchaseTotal","value"=>"$purchase->purchase_total"]);
	$html.=input_field(["label"=>"Paid Amount","type"=>"text","name"=>"txtPaidAmount","value"=>"$purchase->paid_amount"]);
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$purchase->remark"]);
	$html.=select_field(["label"=>"Status","name"=>"cmbStatusId","table"=>"status","value"=>"$purchase->status_id"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount","value"=>"$purchase->discount"]);
	$html.=input_field(["label"=>"Vat","type"=>"text","name"=>"txtVat","value"=>"$purchase->vat"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
