<?php
if(isset($_POST["btnCreate"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbPositionId"])){
		$errors["position_id"]="Invalid position_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["cmbShiftId"])){
		$errors["shift_id"]="Invalid shift_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["rdoSex"])){
		$errors["sex"]="Invalid sex";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDob"])){
		$errors["dob"]="Invalid dob";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDoj"])){
		$errors["doj"]="Invalid doj";
	}
	if(!is_valid_mobile($_POST["txtMobile"])){
		$errors["mobile"]="Invalid mobile";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhoto"])){
		$errors["photo"]="Invalid photo";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["chkInactive"])){
		$errors["inactive"]="Invalid inactive";
	}

*/
	if(count($errors)==0){
		$employee=new Employee();
		$employee->name=$_POST["txtName"];
		$employee->position_id=$_POST["cmbPositionId"];
		$employee->shift_id=$_POST["cmbShiftId"];
		$employee->sex=$_POST["rdoSex"];
		$employee->dob=$_POST["txtDob"];
		$employee->doj=$_POST["txtDoj"];
		$employee->mobile=$_POST["txtMobile"];
		$employee->address=$_POST["txtAddress"];
		$employee->photo=upload($_FILES["filePhoto"], "img",$_POST["txtid"]);
		$employee->inactive=isset($_POST["chkInactive"])?1:0;

		$employee->save();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="employees">Manage Employee</a>
<form class='form-horizontal' action='create-employee' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName"]);
	$html.=select_field(["label"=>"Position","name"=>"cmbPositionId","table"=>"employee_positions"]);
	$html.=select_field(["label"=>"Shift","name"=>"cmbShiftId","table"=>"shifts"]);
	$html.=input_field(["label"=>"Male","type"=>"radio","name"=>"rdoSex","value"=>"0"]);
	$html.=input_field(["label"=>"Female","type"=>"radio","name"=>"rdoSex","value"=>"1"]);
	$html.=input_field(["label"=>"Dob","type"=>"text","name"=>"txtDob"]);
	$html.=input_field(["label"=>"Doj","type"=>"text","name"=>"txtDoj"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile"]);
	$html.=input_field(["label"=>"Address","type"=>"text","name"=>"txtAddress"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"1"]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnCreate", "value"=>"Create"]);
	echo $html;
?>
</form>
</div>
