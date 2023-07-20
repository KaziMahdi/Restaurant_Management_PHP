<?php
if(isset($_POST["btnDetails"])){
	$requisition=Requisition::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="requisitions">Manage Requisition</a>
<table class='table'>
	<tr><th colspan='2'>Requisition Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$requisition->id</td></tr>";
		$html.="<tr><th>Name</th><td>$requisition->name</td></tr>";
		$html.="<tr><th>Price</th><td>$requisition->price</td></tr>";
		$html.="<tr><th>Qty</th><td>$requisition->qty</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$requisition->uom_id</td></tr>";
		$html.="<tr><th>Created Date</th><td>$requisition->created_date</td></tr>";

	echo $html;
?>
</table>
</div>
