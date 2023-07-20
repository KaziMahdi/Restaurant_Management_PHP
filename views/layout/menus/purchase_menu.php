<?php
	echo main_sidebar_dropdown([
		"name"=>"Purchase",
		"icon"=>"nav-icon fa fa-shopping-bag",
		"links"=>[
			["route"=>"create-purchase","text"=>"Create Purchase","icon"=>"far fa-circle nav-icon"],
			["route"=>"purchases","text"=>"Manage Purchase","icon"=>"far fa-circle nav-icon"],
			["route"=>"requisitions","text"=>"Manage Requisition","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
