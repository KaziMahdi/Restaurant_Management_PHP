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

*/
	if(count($errors)==0){
		$supplier=new Supplier();
		$supplier->name=$_POST["txtName"];
		$supplier->mobile=$_POST["txtMobile"];
		$supplier->email=$_POST["txtEmail"];

		$supplier->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="suppliers">Manage Supplier</a>
<form class='form-horizontal' action='create-supplier' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile"]);
	$html.=input_field(["label"=>"Email","type"=>"text","name"=>"txtEmail"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
