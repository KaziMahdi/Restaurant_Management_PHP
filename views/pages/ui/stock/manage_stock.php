<?php
if(isset($_POST["btnDelete"])){
	Stock::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Stock Report"]);
?>
<div class="p-4">
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Stock::html_table($current_page,5);
?>
</div>
