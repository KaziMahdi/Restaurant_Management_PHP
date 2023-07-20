<?php
if(isset($_POST["Details"])){
	$stock=Stock::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stocks">Stock Report</a>
<table class='table'>
	<tr><th colspan='2'>Stock Details</th></tr>
<?php
	echo Stock::html_table();
?>
</table>
</div>
