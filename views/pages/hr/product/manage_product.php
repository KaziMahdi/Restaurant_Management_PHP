<?php
if(isset($_POST["btnDelete"])){
	Product::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage Product"]);
?>
<div class="p-4">
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Product::html_table($current_page,5);
?>
</div>
