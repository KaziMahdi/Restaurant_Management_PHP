<?php
if(isset($_POST["btnDetails"])){
	$menu=Menu::find($_POST["txtId"]);
}
?>
<div class="p-4">
<a class="btn btn-success" href="menus">Manage Menu</a>
<table class='table'>
	<tr><th colspan='2'>Menu Details</th></tr>
<?php
	$html="";
		$html.="<tr><th>Id</th><td>$menu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$menu->name</td></tr>";
		$html.="<tr><th>Offer Price</th><td>$menu->offer_price</td></tr>";
		$html.="<tr><th>Regular Price</th><td>$menu->regular_price</td></tr>";
		$html.="<tr><th>Description</th><td>$menu->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$menu->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Category Id</th><td>$menu->category_id</td></tr>";
		$html.="<tr><th>Offer Discount</th><td>$menu->offer_discount</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$menu->uom_id</td></tr>";
		$html.="<tr><th>Barcode</th><td>$menu->barcode</td></tr>";
		$html.="<tr><th>Created At</th><td>$menu->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$menu->updated_at</td></tr>";

	echo $html;
?>
</table>
</div>
