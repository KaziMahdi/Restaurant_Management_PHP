
          <?php
	echo main_sidebar_dropdown([
		"name"=>"System",
		"icon"=>"nav-icon fas fa-cogs",
		"links"=>[
			["route"=>"roles","text"=>"Manage Role","icon"=>"fas fa-users nav-icon"],
			["route"=>"create-user","text"=>"Create User","icon"=>"far fa-circle nav-icon"],
			["route"=>"users","text"=>"Manage User","icon"=>"far fa-circle nav-icon"],
      ["route"=>"change-password","text"=>"Change Password","icon"=>"fa fa-ellipsis-h nav-icon"],
      ["route"=>"send-email","text"=>"Send Email","icon"=>"fa fa-envelope nav-icon"],
      ["route"=>"manage-system-log","text"=>"Manage System Log","icon"=>"fa fa-tasks nav-icon"],
      ["route"=>"settings","text"=>"Settings","icon"=>"fa fa-cog nav-icon"],
      ["route"=>"logout.php","text"=>"Sign Out","icon"=>"fa fa-sign-out nav-icon"],
		]
	]);
?>
