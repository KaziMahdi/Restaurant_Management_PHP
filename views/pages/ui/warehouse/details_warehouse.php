<?php
if(isset($_POST["btnDetails"])){
	$warehouse=Warehouse::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="warehouses">Manage Warehouse</a>
<?php echo table_wrap_open();?>
<table class='table'>
	<tr><th colspan='2'>Warehouse Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$warehouse->id</td></tr>";
		$html.="<tr><th>Name</th><td>$warehouse->name</td></tr>";
		$html.="<tr><th>City</th><td>$warehouse->city</td></tr>";
		$html.="<tr><th>Contact</th><td>$warehouse->contact</td></tr>";

	echo $html;
?>
</table>
<?php echo table_wrap_close();?>
</div>
