<?php
if(isset($_POST["btnEdit"])){
	$employee=Employee::find($_POST["txtId"]);
}
if(isset($_POST["btnUpdate"])){
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
		$employee->id=$_POST["txtId"];
		$employee->name=$_POST["txtName"];
		$employee->position_id=$_POST["cmbPositionId"];
		$employee->shift_id=$_POST["cmbShiftId"];
		$employee->sex=$_POST["rdoSex"];
		$employee->dob=$_POST["txtDob"];
		$employee->doj=$_POST["txtDoj"];
		$employee->mobile=$_POST["txtMobile"];
		$employee->address=$_POST["txtAddress"];
		if($_FILES["filePhoto"]["name"]!=""){
			$employee->photo=upload($_FILES["filePhoto"], "img",$_POST["txtId"]);
		}else{
			$employee->photo=Employee::find($_POST["txtId"])->photo;
		}
		$employee->inactive=isset($_POST["chkInactive"])?1:0;

		$employee->update();
	}else{
		 print_r($errors);
	}
}
?>
<div class="p-4">
<a class="btn btn-success" href="employees">Manage Employee</a>
<form class='form-horizontal' action='edit-employee' method='post' enctype='multipart/form-data'>
<?php
	$html="";
	$html.=input_field(["label"=>"Id","type"=>"hidden","name"=>"txtId","value"=>"$employee->id"]);
	$html.=input_field(["label"=>"Name","type"=>"text","name"=>"txtName","value"=>"$employee->name"]);
	$html.=select_field(["label"=>"Position","name"=>"cmbPositionId","table"=>"positions","value"=>"$employee->position_id"]);
	$html.=select_field(["label"=>"Shift","name"=>"cmbShiftId","table"=>"shifts","value"=>"$employee->shift_id"]);
	$html.=input_field(["label"=>"Male","type"=>"radio","name"=>"rdoSex","value"=>"$employee->sex","checked"=>$employee->sex?"checked":""]);
	$html.=input_field(["label"=>"Female","type"=>"radio","name"=>"rdoSex","value"=>"$employee->sex","checked"=>$employee->sex?"checked":""]);
	$html.=input_field(["label"=>"Dob","type"=>"text","name"=>"txtDob","value"=>"$employee->dob"]);
	$html.=input_field(["label"=>"Doj","type"=>"text","name"=>"txtDoj","value"=>"$employee->doj"]);
	$html.=input_field(["label"=>"Mobile","type"=>"text","name"=>"txtMobile","value"=>"$employee->mobile"]);
	$html.=input_field(["label"=>"Address","type"=>"text","name"=>"txtAddress","value"=>"$employee->address"]);
	$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);
	$html.=input_field(["label"=>"Inactive","type"=>"checkbox","name"=>"chkInactive","value"=>"$employee->inactive","checked"=>$employee->inactive?"checked":""]);

	echo $html;
?>
<?php
	$html = input_button(["type"=>"submit", "name"=>"btnUpdate", "value"=>"Update"]);
	echo $html;
?>
</form>
</div>
