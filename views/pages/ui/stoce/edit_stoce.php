<?php
if(isset($_POST["btnEdit"])){
	$stoce=Stoce::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$stoce=new Stoce();
		$stoce->id=$_POST["txtId"];

		$stoce->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stoces">Manage Stoce</a>
<form class='form-horizontal' action='edit-stoce' method='post' enctype='multipart/form-data'>
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
