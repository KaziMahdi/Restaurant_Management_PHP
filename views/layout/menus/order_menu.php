<?php
	echo main_sidebar_dropdown([
		"name"=>"Order",
		"icon"=>"nav-icon fa fa-cart-arrow-down",
		"links"=>[
			["route"=>"create-order","text"=>"Create Order","icon"=>"far fa-circle nav-icon"],
			["route"=>"orders","text"=>"Manage Order","icon"=>"far fa-circle nav-icon"],
			
		]
	]);
?>
