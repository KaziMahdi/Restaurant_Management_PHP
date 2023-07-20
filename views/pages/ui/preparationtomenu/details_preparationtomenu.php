<?php
if(isset($_POST["btnDetails"])){
	$preparationtomenu=PreparationToMenu::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="preparation_to_menus">Manage PreparationToMenu</a>
<table class='table'>
	<tr><th colspan='2'>PreparationToMenu Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$preparationtomenu->id</td></tr>";
		$html.="<tr><th>Menu Id</th><td>$preparationtomenu->menu_id</td></tr>";
		$html.="<tr><th>Sub Preparation Id</th><td>$preparationtomenu->sub_preparation_id</td></tr>";
		$html.="<tr><th>Mesure</th><td>$preparationtomenu->mesure</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$preparationtomenu->uom_id</td></tr>";
		$html.="<tr><th>Pic</th><td>$preparationtomenu->pic</td></tr>";

	echo $html;
?>
</table>
</div>
