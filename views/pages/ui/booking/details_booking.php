<?php
if(isset($_POST["btnDetails"])){
	$booking=Booking::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="bookings">Manage Booking</a>
<table class='table'>
	<tr><th colspan='2'>Booking Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$booking->id</td></tr>";
		$html.="<tr><th>Name</th><td>$booking->name</td></tr>";

	echo $html;
?>
</table>
</div>
