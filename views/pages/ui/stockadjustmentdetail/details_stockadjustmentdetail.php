<?php
if(isset($_POST["btnDetails"])){
	$stockadjustmentdetail=StockAdjustmentDetail::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustment_details">Manage StockAdjustmentDetail</a>
<table class='table'>
	<tr><th colspan='2'>StockAdjustmentDetail Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$stockadjustmentdetail->id</td></tr>";
		$html.="<tr><th>Adjustment Id</th><td>$stockadjustmentdetail->adjustment_id</td></tr>";
		$html.="<tr><th>Variety Id</th><td>$stockadjustmentdetail->variety_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$stockadjustmentdetail->qty</td></tr>";
		$html.="<tr><th>Price</th><td>$stockadjustmentdetail->price</td></tr>";

	echo $html;
?>
</table>
</div>
