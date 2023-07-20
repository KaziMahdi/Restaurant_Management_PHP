<?php
if(isset($_POST["btnDetails"])){
	$department=Department::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="departments">Manage Department</a>
<?php //echo table_section_header();?>
<table class='table'>
	<tr><th colspan='2'>Department Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$department->id</td></tr>";
		$html.="<tr><th>Code</th><td>$department->code</td></tr>";
		$html.="<tr><th>Short Name</th><td>$department->short_name</td></tr>";
		$html.="<tr><th>Long Name</th><td>$department->long_name</td></tr>";

	echo $html;
?>
</table>
<?php //echo table_section_footer();?>
</div>
