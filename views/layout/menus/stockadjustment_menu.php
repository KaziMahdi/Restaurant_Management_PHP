<?php
	echo main_sidebar_dropdown([
		"name"=>"StockAdjustment",
		"icon"=>"nav-icon fa fa-thermometer-full",
		"links"=>[
			["route"=>"create-stockadjustment","text"=>"Create StockAdjustment","icon"=>"far fa-circle nav-icon"],
			["route"=>"stock_adjustments","text"=>"Manage StockAdjustment","icon"=>"far fa-circle nav-icon"],
			["route"=>"stock_adjustment_types","text"=>"Manage StockAdjustmentType","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
