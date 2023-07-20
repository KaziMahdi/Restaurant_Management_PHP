<?php
if(isset($_POST["btnDetails"])){
	$employeeposition=EmployeePosition::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="employee_positions">Manage EmployeePosition</a>
<table class='table'>
	<tr><th colspan='2'>EmployeePosition Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$employeeposition->id</td></tr>";
		$html.="<tr><th>Name</th><td>$employeeposition->name</td></tr>";

	echo $html;
?>
</table>
</div>
