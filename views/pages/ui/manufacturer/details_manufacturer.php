<?php
if(isset($_POST["btnDetails"])){
	$manufacturer=Manufacturer::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="manufacturers">Manage Manufacturer</a>
<table class='table'>
	<tr><th colspan='2'>Manufacturer Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$manufacturer->id</td></tr>";
		$html.="<tr><th>Name</th><td>$manufacturer->name</td></tr>";

	echo $html;
?>
</table>
</div>
