<?php
if($page=="create-employeeposition"){
	$found=include("views/pages/ui/employeeposition/create_employeeposition.php");
}elseif($page=="edit-employeeposition"){
	$found=include("views/pages/ui/employeeposition/edit_employeeposition.php");
}elseif($page=="employee_positions"){
	$found=include("views/pages/ui/employeeposition/manage_employeeposition.php");
}elseif($page=="details-employeeposition"){
	$found=include("views/pages/ui/employeeposition/details_employeeposition.php");
}elseif($page=="view-employeeposition"){
	$found=include("views/pages/ui/employeeposition/view_employeeposition.php");
}
?>