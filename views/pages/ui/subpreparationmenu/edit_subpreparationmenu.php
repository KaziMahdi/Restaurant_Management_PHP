<?php
if(isset($_POST["btnEdit"])){
	$subpreparationmenu=SubPreparationmenu::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
	if(count($errors)==0){
		$subpreparationmenu=new SubPreparationmenu();
		$subpreparationmenu->id=$_POST["txtId"];
		$subpreparationmenu->name=$_POST["txtName"];

		$subpreparationmenu->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="sub_preparationmenus">Manage SubPreparationmenu</a>
<form class='form-horizontal' action='edit-subpreparationmenu' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$subpreparationmenu->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$subpreparationmenu->name"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
