<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$stoce=new Stoce();

		$stoce->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stoces">Manage Stoce</a>
<form class='form-horizontal' action='create-stoce' method='post' enctype='multipart/form-data'>
<?php
	$html="";

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
