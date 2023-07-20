<?php
if(isset($_POST["btnDetails"])){
	$section=Section::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="sections">Manage Section</a>
<table class='table'>
	<tr><th colspan='2'>Section Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$section->id</td></tr>";
		$html.="<tr><th>Name</th><td>$section->name</td></tr>";

	echo $html;
?>
</table>
</div>
