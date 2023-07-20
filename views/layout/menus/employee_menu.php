<?php
	echo main_sidebar_dropdown([
		"name"=>"Employee",
		"icon"=>"nav-icon fa fa-street-view",
		"links"=>[
			["route"=>"create-employee","text"=>"Create Employee","icon"=>"far fa-circle nav-icon"],
			["route"=>"employees","text"=>"Manage Employee","icon"=>"far fa-circle nav-icon"],
			["route"=>"employee_positions","text"=>"Manage EmployeePosition","icon"=>"far fa-circle nav-icon"],
			["route"=>"shifts","text"=>"Manage Shift","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
