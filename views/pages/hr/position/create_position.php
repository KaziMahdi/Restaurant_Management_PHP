<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtGrade"])){
		$errors["grade"]="Invalid grade";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbDepartmentId"])){
		$errors["department_id"]="Invalid department_id";
	}

*/
	if(count($errors)==0){
		$position=new Position();
		$position->name=$_POST["txtName"];
		$position->grade=$_POST["txtGrade"];
		$position->department_id=$_POST["cmbDepartmentId"];

		$position->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="positions">Manage Position</a>
<?php //echo form_section_header();?>
<form class='form-horizontal' action='create-position' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=input_field(["label"=>"Grade","type"=>"text","name"=>"txtGrade"]);
	$html.=select_field(["label"=>"Department","name"=>"cmbDepartmentId","display_column"=>"long_name","table"=>"departments"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
<?php //echo form_section_footer();?>
</div>
