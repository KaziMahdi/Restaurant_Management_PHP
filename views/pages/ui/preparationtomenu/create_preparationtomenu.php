<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbMenuId"])){
		$errors["menu_id"]="Invalid menu_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbSubPreparationId"])){
		$errors["sub_preparation_id"]="Invalid sub_preparation_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMesure"])){
		$errors["mesure"]="Invalid mesure";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbUomId"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPic"])){
		$errors["pic"]="Invalid pic";
	}

*/
	if(count($errors)==0){
		$preparationtomenu=new PreparationToMenu();
		$preparationtomenu->menu_id=$_POST["cmbMenuId"];
		$preparationtomenu->sub_preparation_id=$_POST["cmbSubPreparationId"];
		$preparationtomenu->mesure=$_POST["txtMesure"];
		$preparationtomenu->uom_id=$_POST["cmbUomId"];
		$preparationtomenu->pic=$_POST["txtPic"];

		$preparationtomenu->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="preparation_to_menus">Manage PreparationToMenu</a>
<form class='form-horizontal' action='create-preparationtomenu' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=select_field(["label"=>"Menu","name"=>"cmbMenuId","table"=>"menus"]);
	$html.=select_field(["label"=>"Sub Preparation","name"=>"cmbSubPreparationId","table"=>"sub_preparationmenus"]);
	$html.=input_field(["label"=>"Mesure","type"=>"text","name"=>"txtMesure"]);
	$html.=select_field(["label"=>"Uom","name"=>"cmbUomId","table"=>"uom"]);
	$html.=input_field(["label"=>"Pic","type"=>"text","name"=>"txtPic"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
