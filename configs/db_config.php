<?php   
   //Remote
   

   // define("SERVER","localhost");
   //   define("USER","mahdi");
   //   define("DATABASE","wdpf52_mahdi");
   //   define("PASSWORD","mahdi@b890;");

    

   //Local
   
   define("SERVER","localhost");
   define("USER","root");
   define("DATABASE","test");
   define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="core_";
    

?>