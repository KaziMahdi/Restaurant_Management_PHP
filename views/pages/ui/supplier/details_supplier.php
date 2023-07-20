<?php
if(isset($_POST["btnDetails"])){
	$supplier=Supplier::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="suppliers">Manage Supplier</a>
<table class='table'>
	<tr><th colspan='2'>Supplier Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$supplier->id</td></tr>";
		$html.="<tr><th>Name</th><td>$supplier->name</td></tr>";
		$html.="<tr><th>Mobile</th><td>$supplier->mobile</td></tr>";
		$html.="<tr><th>Email</th><td>$supplier->email</td></tr>";

	echo $html;
?>
</table>
</div>
