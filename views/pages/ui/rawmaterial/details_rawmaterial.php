<?php
if(isset($_POST["btnDetails"])){
	$rawmaterial=RawMaterial::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="raw_materials">Manage RawMaterial</a>
<table class='table'>
	<tr><th colspan='2'>RawMaterial Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$rawmaterial->id</td></tr>";
		$html.="<tr><th>R Name</th><td>$rawmaterial->r_name</td></tr>";
		$html.="<tr><th>Price</th><td>$rawmaterial->price</td></tr>";
		$html.="<tr><th>Measure</th><td>$rawmaterial->measure</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$rawmaterial->uom_id</td></tr>";

	echo $html;
?>
</table>
</div>
