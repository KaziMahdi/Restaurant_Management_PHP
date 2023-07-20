<Style>
    hr {
    height: 1px;
    color: #123455;
    background-color: #123455;
    border: none;
    
  }
  #dash a{
  display: block;
  font-size: 16px;
  padding: 1rem 1.5rem;
  color: grey;
  transition: all 0.3s linear;
  text-decoration: none;
}
#dash a:hover {
  background: #0d3b5c;
  padding-left: 1.7rem;
  color:#FFFFFF;
}
  </style>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-blue">
      <img src="img/food.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Restaurant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="menu-sidebar2__content js-scrollbar1" class="">
                <div class="account2">
                    <div class="image img-cir img-120" >
                        <img src="img/icon/avatar-big-01.jpg" class="rounded-circle w-50 p-3 mx-auto d-block" alt="John Doe"/>
                    </div>
                    <h4 class="name d-flex justify-content-center"><?php echo $_SESSION["uname"], ", ", $_SESSION["urole"] ?></h4>
                </div>
      </div>
      <hr>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="dash">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item ">
            <a href="home" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <?php
          include("menus/menu.php");
          ?>
         
      
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fa fa-sign-out nav-icon"></i>
              <p>
                Sign Out
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>