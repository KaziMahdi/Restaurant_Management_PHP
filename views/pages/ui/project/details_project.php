<?php
if(isset($_POST["btnDetails"])){
	$project=Project::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="projects">Manage Project</a>
<table class='table'>
	<tr><th colspan='2'>Project Details</th></tr>
<?php
	$html="";

	echo $html;
?>
</table>
</div>
