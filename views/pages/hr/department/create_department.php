<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCode"])){
		$errors["code"]="Invalid code";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShortName"])){
		$errors["short_name"]="Invalid short_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLongName"])){
		$errors["long_name"]="Invalid long_name";
	}

*/
	if(count($errors)==0){
		$department=new Department();
		$department->code=$_POST["txtCode"];
		$department->short_name=$_POST["txtShortName"];
		$department->long_name=$_POST["txtLongName"];

		$department->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="departments">Manage Department</a>
<?php //echo form_section_header();?>
<form class='form-horizontal' action='create-department' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Code","type"=>"text","name"=>"txtCode"]);
	$html.=input_field(["label"=>"Short Name","type"=>"text","name"=>"txtShortName"]);
	$html.=input_field(["label"=>"Long Name","type"=>"text","name"=>"txtLongName"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php //echo form_section_footer();?>
</div>
