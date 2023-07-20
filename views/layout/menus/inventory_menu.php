
<?php
	echo main_sidebar_dropdown([
		"name"=>"Inventroy",
		"icon"=>"nav-icon fa fa-th-list",
		"links"=>[
			["route"=>"menus","text"=>"Manage Menu","icon"=>"far fa-circle nav-icon"],
			["route"=>"categories","text"=>"Manage Category","icon"=>"far fa-circle nav-icon"],
			["route"=>"warehouses","text"=>"Manage Warehouses","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>

