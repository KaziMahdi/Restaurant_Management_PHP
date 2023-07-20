<?php
if(isset($_POST["btnDetails"])){
	$mesur=Mesur::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="mesurs">Manage Mesur</a>
<table class='table'>
	<tr><th colspan='2'>Mesur Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$mesur->id</td></tr>";
		$html.="<tr><th>Mesure</th><td>$mesur->mesure</td></tr>";

	echo $html;
?>
</table>
</div>
