<?php
if(isset($_POST["btnEdit"])){
	$expenstion=Expenstion::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbEmployeeId"])){
		$errors["employee_id"]="Invalid employee_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbBookingId"])){
		$errors["booking_id"]="Invalid booking_id";
	}

*/
	if(count($errors)==0){
		$expenstion=new Expenstion();
		$expenstion->id=$_POST["txtId"];
		$expenstion->employee_id=$_POST["cmbEmployeeId"];
		$expenstion->booking_id=$_POST["cmbBookingId"];
		$expenstion->created_at=$now;
		$expenstion->updated_at=$now;

		$expenstion->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="expenstions">Manage Expenstion</a>
<form class='form-horizontal' action='edit-expenstion' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$expenstion->id"]);
	$html.=select_field(["label"=>"Employee","name"=>"cmbEmployeeId","table"=>"employees","value"=>"$expenstion->employee_id"]);
	$html.=select_field(["label"=>"Booking","name"=>"cmbBookingId","table"=>"bookings","value"=>"$expenstion->booking_id"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
