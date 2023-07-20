<?php
if(isset($_POST["btnEdit"])){
	$position=Position::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$position->id=$_POST["txtId"];
		$position->name=$_POST["txtName"];
		$position->grade=$_POST["cmbGrade"];
		$position->department_id=$_POST["cmbDepartmentId"];

		$position->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="positions">Manage Position</a>
<?php //echo form_section_header();?>
<form class='form-horizontal' action='edit-position' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$position->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$position->name"]);
	$html.=input_field(["label"=>"Grade","type"=>"text","name"=>"txtGrade","value"=>"$position->grade"]);
	$html.=select_field(["label"=>"Department","name"=>"cmbDepartmentId","table"=>"departments","display_column"=>"long_name","value"=>"$position->department_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
<?php //echo form_section_footer();?>
</div>
