<?php        
      if(isset($_POST["btnCreate"])){
        $table=$_POST["txtTable"]; 
        
        
        if(isset($_POST["chkIntellect"])){
       
          probot_intellect($table);
          echo "Success";
        }

        if(isset($_POST["chkLaravel"])){
         // $laravel=$_POST["chkLaravel"]; 
          probot_laravel($table);
          echo "Success";
        }

        if(isset($_POST["chkAngular"])){
          //$angular=$_POST["chkAngular"]; 
          probot_angular($table);
          echo "Success";
        }

        if(isset($_POST["chkCodeIgniter"])){
          $codeigniter=$_POST["chkCodeIgniter"]; 
          echo $codeigniter;
          echo "Success";
        }


       
        //generate_code($table);
       
      }   
            
 ?>
<div class="row">
  <div class="col">
     <h1  style="padding:20px"> Probot</h1>
  </div>
</div>
<div class="row">

  <div class="col-6">
  
<form action="probot" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php                   
                            
                   echo input_field(["label"=>"Table Name","name"=>"txtTable","type"=>"text","placeholder"=>"Enter table name without table prefix","required"=>"required"]);
                   
                   echo input_field(["type"=>"checkbox","label"=>"Intellect","name"=>"chkIntellect","value"=>"intellect","checked"=>"checked"]);
                   echo input_field(["type"=>"checkbox","label"=>"Angular","name"=>"chkAngular","value"=>"angular"]);
                   echo input_field(["type"=>"checkbox","label"=>"Laravel","name"=>"chkLaravel","value"=>"laravel"]);
                   echo input_field(["type"=>"checkbox","label"=>"CodeIgniter","name"=>"chkCodeIgniter","value"=>"codeigniter"]);
                 
                   ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                    <?php
                    echo input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Generate"]);
                    echo input_button(["type"=>"reset","name"=>"btnClear","value"=>"Clear"]);

                    ?>
                   
                  </div>              
                </div>
                <!-- /.card-footer -->
          </form>

    </div>
 
    </div>

    <div class="row">
   
     <div class="col-4" style="height:400px;overflow:auto;">
      <?php
        $result=$db->query("show tables like '$tx%'");
        echo "<table class='table table-striped'>";
        echo "<tr><th>SN</th><th>Table</th></tr>";
        $i=1;
        while(list($table)=$result->fetch_row()){
          echo "<tr><td>{$i}</td><td><a href='javascript:void(0)' class='selected-table' data-table='$table'>$table</a></td></tr>";
          $i++;
        }
        echo "</table>";
      ?>
   
     </div>
     <div class="col-8">
         <div id="table-desc" >

         </div>
      </div>
    </div>

    <script>
      $(function(){

        $(".selected-table").on("click",function(){
          let table=$(this).data("table");
           //$("#txtTable").val(table);

           $.ajax({
             type:"post",            
             url:"api/descTable",
             data:{'table':table},
             success:function(res){
              $("#table-desc").html(res);
             }
           });

           
          //  ajax("api/descTable",{'table':table}).then(res=>{

          //   console.log(res);
          //   // $("#table-desc").html(res);

          //  });

        })
         
      });
    </script>