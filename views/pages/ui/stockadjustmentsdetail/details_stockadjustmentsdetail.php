<?php
if(isset($_POST["btnDetails"])){
	$stockadjustmentsdetail=StockAdjustmentsDetail::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stock_adjustments_details">Manage StockAdjustmentsDetail</a>
<table class='table'>
	<tr><th colspan='2'>StockAdjustmentsDetail Details</th></tr>
<?php
	$html="";

	echo $html;
?>
</table>
</div>
