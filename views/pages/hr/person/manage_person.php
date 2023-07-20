<?php
if(isset($_POST["btnDelete"])){
	Person::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage Person"]);
?>
<div class="p-4">
<?php echo table_header();?>
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Person::html_table($current_page,5);
?>
<?php echo table_footer();?>
</div>
