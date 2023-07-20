<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_mobile($_POST["txtMobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!is_valid_email($_POST["txtEmail"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPassword"])){
		$errors["password"]="Invalid password";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbCountryId"])){
		$errors["country_id"]="Invalid country_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtStreetAddress"])){
		$errors["street_address"]="Invalid street_address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCity"])){
		$errors["city"]="Invalid city";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPostcode"])){
		$errors["postcode"]="Invalid postcode";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtApartment"])){
		$errors["apartment"]="Invalid apartment";
	}

*/
	if(count($errors)==0){
		$customer=new Customer();
		$customer->name=$_POST["txtName"];
		$customer->mobile=$_POST["txtMobile"];
		$customer->email=$_POST["txtEmail"];
		$customer->created_at=$now;
		$customer->updated_at=$now;
		$customer->password=$_POST["txtPassword"];
		$customer->country_id=$_POST["cmbCountryId"];
		$customer->street_address=$_POST["txtStreetAddress"];
		$customer->city=$_POST["txtCity"];
		$customer->postcode=$_POST["txtPostcode"];
		$customer->apartment=$_POST["txtApartment"];

		$customer->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="customers">Manage Customer</a>
<form class='form-horizontal' action='create-customer' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile"]);
	$html.=input_field(["label"=>"Email","type"=>"text","name"=>"txtEmail"]);
	$html.=input_field(["label"=>"Password","type"=>"text","name"=>"txtPassword"]);
	$html.=select_field(["label"=>"Country","name"=>"cmbCountryId","table"=>"countries"]);
	$html.=input_field(["label"=>"Street Address","type"=>"text","name"=>"txtStreetAddress"]);
	$html.=input_field(["label"=>"City","type"=>"text","name"=>"txtCity"]);
	$html.=input_field(["label"=>"Postcode","type"=>"text","name"=>"txtPostcode"]);
	$html.=input_field(["label"=>"Apartment","type"=>"text","name"=>"txtApartment"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
