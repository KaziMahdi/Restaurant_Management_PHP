<?php
if(isset($_POST["btnDelete"])){
	Employee::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage Employee"]);
?>
<div class="p-4">
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Employee::html_table($current_page,5);
?>
</div>
