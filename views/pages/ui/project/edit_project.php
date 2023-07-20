<?php
if(isset($_POST["btnEdit"])){
	$project=Project::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$project=new Project();
		$project->id=$_POST["txtId"];

		$project->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="projects">Manage Project</a>
<form class='form-horizontal' action='edit-project' method='post' enctype='multipart/form-data'>
<?php
	$html="";

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
