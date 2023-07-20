<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOfferPrice"])){
		$errors["offer_price"]="Invalid offer_price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRegularPrice"])){
		$errors["regular_price"]="Invalid regular_price";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbCategoryId"])){
		$errors["category_id"]="Invalid category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOfferDiscount"])){
		$errors["offer_discount"]="Invalid offer_discount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBarcode"])){
		$errors["barcode"]="Invalid barcode";
	}

*/
	if(count($errors)==0){
		$menu=new Menu();
		$menu->name=$_POST["txtName"];
		$menu->offer_price=$_POST["txtOfferPrice"];
		$menu->regular_price=$_POST["txtRegularPrice"];
		$menu->description=$_POST["txtDescription"];
		$menu->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		$menu->category_id=$_POST["cmbCategoryId"];
		$menu->offer_discount=$_POST["txtOfferDiscount"];
		$menu->uom_id=$_POST["cmbUomId"];
		$menu->barcode=$_POST["txtBarcode"];
		$menu->created_at=$now;
		$menu->created_at=$now;
		$menu->updated_at=$now;
		$menu->updated_at=$now;

		$menu->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="menus">Manage Menu</a>
<form class='form-horizontal' action='create-menu' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Offer Price","type"=>"text","name"=>"txtOfferPrice"]);
	$html.=input_field(["label"=>"Regular Price","type"=>"text","name"=>"txtRegularPrice"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=select_field(["label"=>"Category","name"=>"cmbCategoryId","table"=>"categories"]);
	$html.=input_field(["label"=>"Offer Discount","type"=>"text","name"=>"txtOfferDiscount"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom"]);
	$html.=input_field(["label"=>"Barcode","type"=>"text","name"=>"txtBarcode"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
