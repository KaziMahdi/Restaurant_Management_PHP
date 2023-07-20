<?php
if(isset($_POST["btnDetails"])){
	$order=Order::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="orders">Manage Order</a>
<table class='table'>
	<tr><th colspan='2'>Order Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$order->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$order->customer_id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$order->booking_id</td></tr>";
		$html.="<tr><th>Order Date</th><td>$order->order_date</td></tr>";
		$html.="<tr><th>Delivery Date</th><td>$order->delivery_date</td></tr>";
		$html.="<tr><th>Shipping Address</th><td>$order->shipping_address</td></tr>";
		$html.="<tr><th>Order Total</th><td>$order->order_total</td></tr>";
		$html.="<tr><th>Paid Amount</th><td>$order->paid_amount</td></tr>";
		$html.="<tr><th>Remark</th><td>$order->remark</td></tr>";
		$html.="<tr><th>Status Id</th><td>$order->status_id</td></tr>";
		$html.="<tr><th>Discount</th><td>$order->discount</td></tr>";
		$html.="<tr><th>Vat</th><td>$order->vat</td></tr>";
		$html.="<tr><th>Created At</th><td>$order->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$order->updated_at</td></tr>";

	echo $html;
?>
</table>
</div>
