<?php
if(isset($_POST["btnDetails"])){
	$position=Position::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="positions">Manage Position</a>
<?php //echo table_section_header();?>
<table class='table'>
	<tr><th colspan='2'>Position Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$position->id</td></tr>";
		$html.="<tr><th>Name</th><td>$position->name</td></tr>";
		$html.="<tr><th>Grade</th><td>$position->grade</td></tr>";
		$html.="<tr><th>Department Id</th><td>$position->department_id</td></tr>";

	echo $html;
?>
</table>
<?php //echo table_section_footer();?>
</div>
