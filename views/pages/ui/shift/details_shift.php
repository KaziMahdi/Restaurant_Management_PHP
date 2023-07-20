<?php
if(isset($_POST["btnDetails"])){
	$shift=Shift::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="shifts">Manage Shift</a>
<table class='table'>
	<tr><th colspan='2'>Shift Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$shift->id</td></tr>";
		$html.="<tr><th>Name</th><td>$shift->name</td></tr>";

	echo $html;
?>
</table>
</div>
