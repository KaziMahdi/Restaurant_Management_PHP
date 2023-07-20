<?php
if(isset($_POST["btnDetails"])){
	$orderdetail=OrderDetail::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="order_details">Manage OrderDetail</a>
<table class='table'>
	<tr><th colspan='2'>OrderDetail Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$orderdetail->id</td></tr>";
		$html.="<tr><th>Order Id</th><td>$orderdetail->order_id</td></tr>";
		$html.="<tr><th>Menu Id</th><td>$orderdetail->menu_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$orderdetail->qty</td></tr>";
		$html.="<tr><th>Price</th><td>$orderdetail->price</td></tr>";
		$html.="<tr><th>Vat</th><td>$orderdetail->vat</td></tr>";
		$html.="<tr><th>Discount</th><td>$orderdetail->discount</td></tr>";
		$html.="<tr><th>Created At</th><td>$orderdetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$orderdetail->updated_at</td></tr>";

	echo $html;
?>
</table>
</div>
