<?php
if(isset($_POST["btnDetails"])){
	$stoce=Stoce::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="stoces">Manage Stoce</a>
<table class='table'>
	<tr><th colspan='2'>Stoce Details</th></tr>
<?php
	$html="";

	echo $html;
?>
</table>
</div>
