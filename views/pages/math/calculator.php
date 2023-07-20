<div class="container">
<div class="row">
    <div class="col">
        <h1 style="padding:20px">Calculator</h1>
    </div>
</div>
<div class="row">
    <div class="col">
       <div>
         <input type="text" id="txtDisplay" style="padding:1px;" />
      </div>
       <div>
         <input type="text" id="a" />
         <input type="text" id="b" />
         <select id="cmbOperator" style="padding:4px">
           <option value="+">+</option>
           <option value="-">-</option>
           <option value="*">*</option>
           <option value="/">/</option>           
        </select>
        <input type="button" value="=" id="btnProcess">
       </div>

       <input type="button" id="btnTest" value="Test" />
       <table class="table" id="products">
            
       </table>
    </div>
</div>
</div>


<script>

      $(function(){

         $("#btnProcess").on("click",function(){
         
            let a=$("#a").val();
            let b=$("#b").val();

           let operator=$("#cmbOperator").val();
          
           let method="add";

           if(operator=="+"){
            method="add";
           }else if(operator=="-"){
            method="sub";
           }else if(operator=="*"){
            method="mul";
           }else if(operator=="/"){
            method="div";
           } 
        

          $.ajax({
             type:"post",            
             url:"api/"+method,
             data:{'a':a,'b':b},
             success:function(res){              
               $("#txtDisplay").val(res);
             }
           });  
         

         });


         $("#btnTest").on("click",function(){

            // $.ajax({
            //   type:"post",            
            //   url:"api/getProducts",
            //   data:{},
            //   success:function(res){   
            //      let products=JSON.parse(res);           
                 
            //      let html="";
            //     products.forEach(function(product){                    
            //          html+=`<tr><td>${product.id}</td><td>${product.name}</td></tr>`;                       
            //     });

            //     $("#products").html(html);
            //   }
            // }); 

            ajax('api/getProducts')
            .then(res => {
              console.log(res); // JSON data parsed by `data.json()` call

                let products=res;             
                let html="";
                products.forEach(function(product){                    
                     html+=`<tr><td>${product.id}</td><td>${product.name}</td></tr>`;                       
                });

                $("#products").html(html);
            });


         });
          
         
      });
    </script>