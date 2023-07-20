<?php
if(isset($_POST["btnDetails"])){
	$customer=Customer::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="customers">Manage Customer</a>
<table class='table'>
	<tr><th colspan='2'>Customer Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$customer->id</td></tr>";
		$html.="<tr><th>Name</th><td>$customer->name</td></tr>";
		$html.="<tr><th>Mobile</th><td>$customer->mobile</td></tr>";
		$html.="<tr><th>Email</th><td>$customer->email</td></tr>";
		$html.="<tr><th>Created At</th><td>$customer->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$customer->updated_at</td></tr>";
		$html.="<tr><th>Password</th><td>$customer->password</td></tr>";
		$html.="<tr><th>Country Id</th><td>$customer->country_id</td></tr>";
		$html.="<tr><th>Street Address</th><td>$customer->street_address</td></tr>";
		$html.="<tr><th>City</th><td>$customer->city</td></tr>";
		$html.="<tr><th>Postcode</th><td>$customer->postcode</td></tr>";
		$html.="<tr><th>Apartment</th><td>$customer->apartment</td></tr>";

	echo $html;
?>
</table>
</div>
