<?php
if(isset($_POST["btnDetails"])){
	$expenstiondetaile=ExpenstionDetaile::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="expenstion_detailes">Manage ExpenstionDetaile</a>
<table class='table'>
	<tr><th colspan='2'>ExpenstionDetaile Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$expenstiondetaile->id</td></tr>";
		$html.="<tr><th>Expenstion Id</th><td>$expenstiondetaile->expenstion_id</td></tr>";
		$html.="<tr><th>Material Id</th><td>$expenstiondetaile->material_id</td></tr>";
		$html.="<tr><th>Measure</th><td>$expenstiondetaile->measure</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$expenstiondetaile->uom_id</td></tr>";

	echo $html;
?>
</table>
</div>
