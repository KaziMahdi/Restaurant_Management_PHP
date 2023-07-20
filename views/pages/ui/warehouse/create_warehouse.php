<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCity"])){
		$errors["city"]="Invalid city";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtContact"])){
		$errors["contact"]="Invalid contact";
	}

*/
	if(count($errors)==0){
		$warehouse=new Warehouse();
		$warehouse->name=$_POST["txtName"];
		$warehouse->city=$_POST["txtCity"];
		$warehouse->contact=$_POST["txtContact"];

		$warehouse->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="warehouses">Manage Warehouse</a>
<?php echo form_wrap_open();?>
<form class='form-horizontal' action='create-warehouse' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"City","type"=>"text","name"=>"txtCity"]);
	$html.=input_field(["label"=>"Contact","type"=>"text","name"=>"txtContact"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php echo form_wrap_close();?>
</div>
