<?php
if(isset($_POST["btnEdit"])){
	$stockadjustmentsdetail=StockAdjustmentsDetail::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*

*/
	if(count($errors)==0){
		$stockadjustmentsdetail=new StockAdjustmentsDetail();
		$stockadjustmentsdetail->id=$_POST["txtId"];

		$stockadjustmentsdetail->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustments_details">Manage StockAdjustmentsDetail</a>
<form class='form-horizontal' action='edit-stockadjustmentsdetail' method='post' enctype='multipart/form-data'>
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
