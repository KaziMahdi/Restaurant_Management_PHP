<?php
if(isset($_POST["btnDelete"])){
	Mesur::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage Mesur"]);
?>
<div class="p-4">
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Mesur::html_table($current_page,5);
?>
</div>
