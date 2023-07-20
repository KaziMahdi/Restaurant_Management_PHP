<?php
 
 if(isset($_GET["r"])){
  
   $page=$_GET["r"];    

    $folder="routes";
    foreach (glob("{$folder}/*_route.php") as $filename)
    {
        include $filename;
    }

    if(!isset($found)){
        include("views/pages/404.php");
    }

 }

?>