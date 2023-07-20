
          <?php
	echo main_sidebar_dropdown([
		"name"=>"Booking",
		"icon"=>"nav-icon fa fa-table",
		"links"=>[

			["route"=>"create-booking","text"=>"Create Booking","icon"=>"far fa-circle nav-icon"],
			["route"=>"bookings","text"=>"Manage Booking","icon"=>"far fa-circle nav-icon"],
        ]
      
	]);
?>
