<?php
if(isset($_POST["btnDetails"])){
	$uom=Uom::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="uoms">Manage Uom</a>
<table class='table'>
	<tr><th colspan='2'>Uom Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$uom->id</td></tr>";
		$html.="<tr><th>Name</th><td>$uom->name</td></tr>";

	echo $html;
?>
</table>
</div>
