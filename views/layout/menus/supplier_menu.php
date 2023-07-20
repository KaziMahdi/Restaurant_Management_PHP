<?php
	echo main_sidebar_dropdown([
		"name"=>"Supplier",
		"icon"=>"nav-icon fa fa-truck",
		"links"=>[
			["route"=>"create-supplier","text"=>"Create Supplier","icon"=>"far fa-circle nav-icon"],
			["route"=>"suppliers","text"=>"Manage Supplier","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
