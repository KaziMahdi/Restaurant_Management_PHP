<?php
 function form_wrap_open(){
   $html="<div style='background-color:#fff;padding:10px;border:4px solid gray; border-radius:10px;margin-top:10px'>";
   
   return $html; 
}

 function form_wrap_close(){
   $html="</div>";
   return $html;
 }

 function table_wrap_open(){
    $html="<div style='background-color:#fff;padding:10px;border-radius:10px;border:4px solid #28a745;margin-top:10px;'>";
    
    return $html; 
 }
 
  function table_wrap_close(){
    $html="</div>";
 
    return $html;
  }
?>