<?php session_start();  
  require_once("configs/db_config.php");
  $base_url="cpanel";
  //require_once("library/classes/system_log.class.php");
  
  if(isset($_POST["btnSignIn"])){
    
     $username=trim($_POST["txtUsername"]);
     $password=trim($_POST["txtPassword"]);
     //echo $username," ",$password;
     $result=$db->query("select u.id,u.username,r.name from {$tx}users u,{$tx}roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");

     if($db->affected_rows==1){
         
         list($uid,$_username,$role)=$result->fetch_row();
         $_SESSION["uid"]=$uid;
         $_SESSION["uname"]=$_username;
         $_SESSION["urole"]=$role;

        //  $now=date("Y-m-d H:i:s");
        //  $log=new System_log("","LOGIN","Successfully logged in user : $uid-$_username",$now);
        //  $log->save();

         header("location:home");
        

     }else{
      
        $error="Password or Username incorrect";
       
     }  
  
    }

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="asset/dist/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(img/food.jpg);">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-3text-center mb-3">
						<h2 class="heading-section"></h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap py-5">
					  <div class="img d-flex align-items-center justify-content-center" style="background-image: url(img/food.jpg);"></div>
					  <div style="text-align:center;color:orange;font-weight:bold"> <?php echo isset($error)?$error:"";?></div>
					  <h3 class="text-center mb-0">Welcome</h3>
					  <p class="text-center">Sign in by entering the information below</p>
							<form action="<?php echo $_SERVER['PHP_SELF']?>" class="login-form" method="post">
						  <div class="form-group">
							  <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
							  <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Username" required>
						  </div>
					<div class="form-group">
						<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
					  <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password" required>
					</div>
					<div class="form-group d-md-flex">
									<div class="w-100 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
					</div>
					<div class="form-group">
						<button type="submit" name="btnSignIn" class="btn form-control btn-primary rounded submit px-3">Get Started</button>
					</div>
				  </form>
				  <div class="w-100 text-center mt-4 text">
					  <p class="mb-0">Don't have an account?</p>
					  <a href="#">Sign Up</a>
				  </div>
				</div>
					</div>
				</div>
			</div>
		</section>

	<script src="asset/dist/js/jquery.min.js"></script>
  <script src="asset/dist/js/popper.js"></script>
  <script src="asset/dist/js/bootstrap.min.js"></script>
  <script src="asset/dist/js/main.js"></script>
<!-- /.login-box -->

<!-- jQuery -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<script>
$(function () {

rememberStatus();

$('#txtUsername').on("input",function(){
  remember();
});

$('#txtPassword').on("input",function(){
  remember();
});

$('#chkRemember').click(function () {
  remember();
});

function remember(){
  if ($('#chkRemember').is(':checked')) {
        // save username and password
        localStorage.username = $('#txtUsername').val().trim();
        localStorage.pass = $('#txtPassword').val().trim();
        localStorage.chkbox = $('#chkRemember').val();
    } else {
        localStorage.username = '';
        localStorage.pass = '';
        localStorage.chkbox = '';
    }
}

function rememberStatus(){
    if (localStorage.chkbox && localStorage.chkbox != '') {
      $('#chkRemember').attr('checked', 'checked');
      $('#txtUsername').val(localStorage.username);
      $('#txtPassword').val(localStorage.pass);
    }else {
      $('#chkRemember').removeAttr('checked');
      $('#txtUsername').val('');
      $('#txtPassword').val('');
   }
}

});
  </script>
</body>
</html>
