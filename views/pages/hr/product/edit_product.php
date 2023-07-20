<?php
if(isset($_POST["btnEdit"])){
	$product=Product::find($_POST["txtId"]);
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
		$product->id=$_POST["txtId"];
		$product->name=$_POST["txtName"];
		$product->offer_price=$_POST["txtOfferPrice"];
		$product->manufacturer_id=$_POST["cmbManufacturerId"];
		$product->regular_price=$_POST["txtRegularPrice"];
		$product->description=$_POST["txtDescription"];
		if($_FILES["filePhoto"]["name"]!=""){
			$product->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$product->photo=Product::find($_POST["txtId"])->photo;
		}
		$product->category_id=$_POST["cmbCategoryId"];
		$product->section_id=$_POST["cmbSectionId"];
		$product->is_featured=isset($_POST["chkIsFeatured"])?1:0;
		$product->star=$_POST["cmbStar"];
		$product->is_brand=isset($_POST["chkIsBrand"])?1:0;
		$product->offer_discount=$_POST["txtOfferDiscount"];
		$product->uom_id=$_POST["cmbUomId"];
		$product->weight=$_POST["txtWeight"];
		$product->barcode=$_POST["txtBarcode"];

		$product->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="products">Manage Product</a>
<form class='form-horizontal' action='edit-product' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$product->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$product->name"]);
	$html.=input_field(["label"=>"Offer Price","type"=>"text","name"=>"txtOfferPrice","value"=>"$product->offer_price"]);
	$html.=select_field(["label"=>"Manufacturer","name"=>"cmbManufacturerId","table"=>"manufacturers","value"=>"$product->manufacturer_id"]);
	$html.=input_field(["label"=>"Regular Price","type"=>"text","name"=>"txtRegularPrice","value"=>"$product->regular_price"]);
	$html.=input_field(["label"=>"Description","type"=>"text","name"=>"txtDescription","value"=>"$product->description"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=select_field(["label"=>"Category","name"=>"cmbCategoryId","table"=>"categories","value"=>"$product->category_id"]);
	$html.=select_field(["label"=>"Section","name"=>"cmbSectionId","table"=>"sections","value"=>"$product->section_id"]);
	$html.=input_field(["label"=>"Is Featured","type"=>"checkbox","name"=>"chkIsFeatured","value"=>"$product->is_featured","checked"=>$product->is_featured?"checked":""]);
	$html.=input_field(["label"=>"Star","type"=>"text","name"=>"txtStar","value"=>"$product->star"]);
	$html.=input_field(["label"=>"Is Brand","type"=>"checkbox","name"=>"chkIsBrand","value"=>"$product->is_brand","checked"=>$product->is_brand?"checked":""]);
	$html.=input_field(["label"=>"Offer Discount","type"=>"text","name"=>"txtOfferDiscount","value"=>"$product->offer_discount"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom","value"=>"$product->uom_id"]);
	$html.=input_field(["label"=>"Weight","type"=>"text","name"=>"txtWeight","value"=>"$product->weight"]);
	$html.=input_field(["label"=>"Barcode","type"=>"text","name"=>"txtBarcode","value"=>"$product->barcode"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
