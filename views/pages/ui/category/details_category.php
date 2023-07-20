<?php
if(isset($_POST["btnDetails"])){
	$category=Category::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="categories">Manage Category</a>
<table class='table'>
	<tr><th colspan='2'>Category Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$category->id</td></tr>";
		$html.="<tr><th>Name</th><td>$category->name</td></tr>";
		$html.="<tr><th>Section Id</th><td>$category->section_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$category->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$category->updated_at</td></tr>";

	echo $html;
?>
</table>
</div>
