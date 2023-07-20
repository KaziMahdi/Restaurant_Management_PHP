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
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbManufacturerId"])){
		$errors["manufacturer_id"]="Invalid manufacturer_id";
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
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSectionId"])){
		$errors["section_id"]="Invalid section_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["chkIsFeatured"])){
		$errors["is_featured"]="Invalid is_featured";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtStar"])){
		$errors["star"]="Invalid star";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["chkIsBrand"])){
		$errors["is_brand"]="Invalid is_brand";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtOfferDiscount"])){
		$errors["offer_discount"]="Invalid offer_discount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtWeight"])){
		$errors["weight"]="Invalid weight";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBarcode"])){
		$errors["barcode"]="Invalid barcode";
	}

*/
	if(count($errors)==0){
		$product=new Product();
		$product->name=$_POST["txtName"];
		$product->offer_price=$_POST["txtOfferPrice"];
		$product->manufacturer_id=$_POST["cmbManufacturerId"];
		$product->regular_price=$_POST["txtRegularPrice"];
		$product->description=$_POST["txtDescription"];
		$product->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		$product->category_id=$_POST["cmbCategoryId"];
		$product->section_id=$_POST["cmbSectionId"];
		$product->is_featured=isset($_POST["chkIsFeatured"])?1:0;
		$product->star=$_POST["txtStar"];
		$product->is_brand=isset($_POST["chkIsBrand"])?1:0;
		$product->offer_discount=$_POST["txtOfferDiscount"];
		$product->uom_id=$_POST["cmbUomId"];
		$product->weight=$_POST["txtWeight"];
		$product->barcode=$_POST["txtBarcode"];
		$product->created_at=$now;
		$product->created_at=$now;
		$product->updated_at=$now;
		$product->updated_at=$now;

		$product->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="products">Manage Product</a>
<form class='form-horizontal' action='create-product' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Offer Price","type"=>"text","name"=>"txtOfferPrice"]);
	$html.=select_field(["label"=>"Manufacturer","name"=>"cmbManufacturerId","table"=>"manufacturers"]);
	$html.=input_field(["label"=>"Regular Price","type"=>"text","name"=>"txtRegularPrice"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=select_field(["label"=>"Category","name"=>"cmbCategoryId","table"=>"categories"]);
	$html.=select_field(["label"=>"Section","name"=>"cmbSectionId","table"=>"sections"]);
	$html.=input_field(["label"=>"Is Featured","type"=>"checkbox","name"=>"chkIsFeatured","value"=>"1"]);
	$html.=input_field(["label"=>"Star","type"=>"text","name"=>"txtStar"]);
	$html.=input_field(["label"=>"Is Brand","type"=>"checkbox","name"=>"chkIsBrand","value"=>"1"]);
	$html.=input_field(["label"=>"Offer Discount","type"=>"text","name"=>"txtOfferDiscount"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom"]);
	$html.=input_field(["label"=>"Weight","type"=>"text","name"=>"txtWeight"]);
	$html.=input_field(["label"=>"Barcode","type"=>"text","name"=>"txtBarcode"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
