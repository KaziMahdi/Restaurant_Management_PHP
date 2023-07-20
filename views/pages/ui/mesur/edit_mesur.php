<?php
if(isset($_POST["btnEdit"])){
	$mesur=Mesur::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMesure"])){
		$errors["mesure"]="Invalid mesure";
	}

*/
	if(count($errors)==0){
		$mesur=new Mesur();
		$mesur->id=$_POST["txtId"];
		$mesur->mesure=$_POST["cmbMesure"];

		$mesur->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="mesurs">Manage Mesur</a>
<form class='form-horizontal' action='edit-mesur' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$mesur->id"]);
	$html.=input_field(["label"=>"Mesure","type"=>"text","name"=>"txtMesure","value"=>"$mesur->mesure"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
