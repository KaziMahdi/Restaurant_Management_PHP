<?php
if(isset($_POST["btnDetails"])){
	$purchase=Purchase::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="purchases">Manage Purchase</a>
<table class='table'>
	<tr><th colspan='2'>Purchase Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$purchase->id</td></tr>";
		$html.="<tr><th>Supplier Id</th><td>$purchase->supplier_id</td></tr>";
		$html.="<tr><th>Purchase Date</th><td>$purchase->purchase_date</td></tr>";
		$html.="<tr><th>Delivery Date</th><td>$purchase->delivery_date</td></tr>";
		$html.="<tr><th>Shipping Address</th><td>$purchase->shipping_address</td></tr>";
		$html.="<tr><th>Purchase Total</th><td>$purchase->purchase_total</td></tr>";
		$html.="<tr><th>Paid Amount</th><td>$purchase->paid_amount</td></tr>";
		$html.="<tr><th>Remark</th><td>$purchase->remark</td></tr>";
		$html.="<tr><th>Status Id</th><td>$purchase->status_id</td></tr>";
		$html.="<tr><th>Discount</th><td>$purchase->discount</td></tr>";
		$html.="<tr><th>Vat</th><td>$purchase->vat</td></tr>";

	echo $html;
?>
</table>
</div>
