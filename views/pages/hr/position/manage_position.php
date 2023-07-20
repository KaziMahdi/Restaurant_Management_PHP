<?php
if(isset($_POST["btnDelete"])){
	Position::delete($_POST["txtId"]);
}
?>
<?php
echo page_header(["title"=>"Manage Position"]);
?>
<div class="p-4">
<?php //echo table_section_header();?>
<?php
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	echo Position::html_table($current_page,5);
?>
<?php //echo table_section_footer();?>
</div>
