<?php
	echo main_sidebar_dropdown([
		"name"=>"RawMaterial",
		"icon"=>"nav-icon fa fa-cubes",
		"links"=>[
			["route"=>"create-rawmaterial","text"=>"Create RawMaterial","icon"=>"far fa-circle nav-icon"],
			["route"=>"raw_materials","text"=>"Manage RawMaterial","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-expenstion","text"=>"Create Expenstion","icon"=>"far fa-circle nav-icon"],
			["route"=>"expenstions","text"=>"Manage Expenstion","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-preparationtomenu","text"=>"Create PreparationToMenu","icon"=>"far fa-circle nav-icon"],
			["route"=>"preparation_to_menus","text"=>"Manage PreparationToMenu","icon"=>"far fa-circle nav-icon"],
			["route"=>"create-subpreparationmenu","text"=>"Create SubPreparationmenu","icon"=>"far fa-circle nav-icon"],
			["route"=>"sub_preparationmenus","text"=>"Manage SubPreparationmenu","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
