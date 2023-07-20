<?php
if(isset($_POST["btnEdit"])){
	$order=Order::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbCustomerId"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShippingAddress"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOrderTotal"])){
		$errors["order_total"]="Invalid order_total";
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
		$order=new Order();
		$order->id=$_POST["txtId"];
		$order->customer_id=$_POST["cmbCustomerId"];
		$order->order_date=date("Y-m-d",strtotime($_POST["txtOrderDate"]));
		$order->delivery_date=date("Y-m-d",strtotime($_POST["txtDeliveryDate"]));
		$order->shipping_address=$_POST["txtShippingAddress"];
		$order->order_total=$_POST["txtOrderTotal"];
		
		$order->remark=$_POST["txtRemark"];
		$order->status_id=$_POST["cmbStatusId"];
		$order->discount=$_POST["txtDiscount"];
		$order->vat=$_POST["txtVat"];
		$order->created_at=$now;
		$order->updated_at=$now;

		$order->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="orders">Manage Order</a>
<form class='form-horizontal' action='edit-order' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$order->id"]);
	$html.=select_field(["label"=>"Customer","name"=>"cmbCustomerId","table"=>"customers","value"=>"$order->customer_id"]);
	$html.=input_field(["label"=>"Order Date","type"=>"text","name"=>"txtOrderDate","value"=>"$order->order_date"]);
	$html.=input_field(["label"=>"Delivery Date","type"=>"text","name"=>"txtDeliveryDate","value"=>"$order->delivery_date"]);
	$html.=input_field(["label"=>"Shipping Address","type"=>"text","name"=>"txtShippingAddress","value"=>"$order->shipping_address"]);
	$html.=input_field(["label"=>"Order Total","type"=>"text","name"=>"txtOrderTotal","value"=>"$order->order_total"]);
	
	$html.=input_field(["label"=>"Remark","type"=>"text","name"=>"txtRemark","value"=>"$order->remark"]);
	$html.=select_field(["label"=>"Status","name"=>"cmbStatusId","table"=>"status","value"=>"$order->status_id"]);
	$html.=input_field(["label"=>"Discount","type"=>"text","name"=>"txtDiscount","value"=>"$order->discount"]);
	$html.=input_field(["label"=>"Vat","type"=>"text","name"=>"txtVat","value"=>"$order->vat"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
