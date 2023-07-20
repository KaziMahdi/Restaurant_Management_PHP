<?php
if(isset($_POST["btnEdit"])){
	$menu=Menu::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$menu->id=$_POST["txtId"];
		$menu->name=$_POST["txtName"];
		$menu->offer_price=$_POST["txtOfferPrice"];
		$menu->regular_price=$_POST["txtRegularPrice"];
		$menu->description=$_POST["txtDescription"];
		if($_FILES["filePhoto"]["name"]!=""){
			$menu->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$menu->photo=Menu::find($_POST["txtId"])->photo;
		}
		$menu->category_id=$_POST["cmbCategoryId"];
		$menu->offer_discount=$_POST["txtOfferDiscount"];
		$menu->uom_id=$_POST["cmbUomId"];
		$menu->barcode=$_POST["txtBarcode"];

		$menu->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="menus">Manage Menu</a>
<form class='form-horizontal' action='edit-menu' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$menu->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$menu->name"]);
	$html.=input_field(["label"=>"Offer Price","type"=>"text","name"=>"txtOfferPrice","value"=>"$menu->offer_price"]);
	$html.=input_field(["label"=>"Regular Price","type"=>"text","name"=>"txtRegularPrice","value"=>"$menu->regular_price"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription","value"=>"$menu->description"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=select_field(["label"=>"Category","name"=>"cmbCategoryId","table"=>"categories","value"=>"$menu->category_id"]);
	$html.=input_field(["label"=>"Offer Discount","type"=>"text","name"=>"txtOfferDiscount","value"=>"$menu->offer_discount"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom","value"=>"$menu->uom_id"]);
	$html.=input_field(["label"=>"Barcode","type"=>"text","name"=>"txtBarcode","value"=>"$menu->barcode"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
