<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMesure"])){
		$errors["mesure"]="Invalid mesure";
	}

*/
	if(count($errors)==0){
		$mesur=new Mesur();
		$mesur->mesure=$_POST["txtMesure"];

		$mesur->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="mesurs">Manage Mesur</a>
<form class='form-horizontal' action='create-mesur' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Mesure","type"=>"text","name"=>"txtMesure"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
