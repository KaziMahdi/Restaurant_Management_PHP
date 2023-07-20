<?php
if(isset($_POST["btnDetails"])){
	$person=Person::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="persons">Manage Person</a>
<?php //echo table_section_header();?>
<table class='table'>
	<tr><th colspan='2'>Person Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$person->id</td></tr>";
		$html.="<tr><th>Name</th><td>$person->name</td></tr>";
		$html.="<tr><th>Position Id</th><td>$person->position_id</td></tr>";
		$html.="<tr><th>Sex</th><td>$person->sex</td></tr>";
		$html.="<tr><th>Dob</th><td>$person->dob</td></tr>";
		$html.="<tr><th>Doj</th><td>$person->doj</td></tr>";
		$html.="<tr><th>Mobile</th><td>$person->mobile</td></tr>";
		$html.="<tr><th>Address</th><td>$person->address</td></tr>";
		$html.="<tr><th>Inactive</th><td>$person->inactive</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$person->photo\" width=\"100\" /></td></tr>";

	echo $html;
?>
</table>
<?php //echo table_section_footer();?>
</div>
