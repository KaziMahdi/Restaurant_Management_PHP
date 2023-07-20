<?php
if(isset($_POST["btnDetails"])){
	$subpreparationmenu=SubPreparationmenu::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="sub_preparationmenus">Manage SubPreparationmenu</a>
<table class='table'>
	<tr><th colspan='2'>SubPreparationmenu Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$subpreparationmenu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$subpreparationmenu->name</td></tr>";

	echo $html;
?>
</table>
</div>
