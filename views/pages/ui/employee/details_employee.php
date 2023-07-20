<?php
if(isset($_POST["btnDetails"])){
	$employee=Employee::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="employees">Manage Employee</a>
<table class='table'>
	<tr><th colspan='2'>Employee Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$employee->id</td></tr>";
		$html.="<tr><th>Name</th><td>$employee->name</td></tr>";
		$html.="<tr><th>Position Id</th><td>$employee->position_id</td></tr>";
		$html.="<tr><th>Shift Id</th><td>$employee->shift_id</td></tr>";
		$html.="<tr><th>Sex</th><td>$employee->sex</td></tr>";
		$html.="<tr><th>Dob</th><td>$employee->dob</td></tr>";
		$html.="<tr><th>Doj</th><td>$employee->doj</td></tr>";
		$html.="<tr><th>Mobile</th><td>$employee->mobile</td></tr>";
		$html.="<tr><th>Address</th><td>$employee->address</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$employee->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Inactive</th><td>$employee->inactive</td></tr>";

	echo $html;
?>
</table>
</div>
