<style>
 #cmbCustomer{
   padding:5px;
 }
</style>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Stock Adjustment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> I-SHOP.
                    <small class="float-right">Date: <?php echo date("d M Y")?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>ISHOP, Inc.</strong><br>
                    House:12, Road:1<br>
                    Block:E<br>
                    Mobile: 017834433<br>
                    Email: info@ishop.com
                  </address>
				 
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Warehouse
                  <address>
                    <?php
                      echo Warehouse::html_select("cmbWarehouse");
                    ?>
                   
                   
                  </address>
				  <div>
					User<br>
				   <?php
                      echo User::html_select("cmbUser");
                    ?>
				   </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Adjust ID:</b></td><td><input type="text" style="width:60px" value="<?php  echo StockAdjustment::get_last_id()+1;?>"  readonly/></td></tr>
                    <tr><td><b>Adjust Date:</b></td><td><input type="text" style="width:90px" id="txtAdjustmentDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                    <tr><td><b>Adjust Type:</b></td><td><?php echo StockAdjustmentType::html_select("cmbStockAdjustmentType"); ?></td></tr>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Material</th>
					  <th>Measure</th>
                      <th>Price</th>
                                           
                      
                      <th>Subtotal</th>
                      <th><input type="button" id="clearAll" value="Clear" /></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th>
                        <?php
                           echo RawMaterial::html_select("cmbRawMaterial");
                       ?>
                      </th>
                        <th><input type="text" id="txtMeasure" style="width: 100px;"/></th>
                        <th><input type="text" id="txtPrice" style="width: 100px;" /></th>
                        <th>
						<?php echo Uom::html_select("cmbUom");
                      ?>

						</th>
                       
                        <th></th>
                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                      </tr>
                    </thead>
                    <tbody  id="items">                    
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <strong>Remark</strong><br>
                 <textarea id="txtRemark"></textarea>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal">0</td>
                      </tr>
                      
                     
                      <tr>
                        <th>Total:</th>
                        <td id="net-total">0</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" id="btnProcessAdjustment" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Adjustment </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
      $(function() {  
        
       const cart=new Cart("adjustment");     
         
        printCart();
        
        //Show calander in textbox
        $("#txtAdjustmentDate").datepicker({dateFormat: 'dd-mm-yy'});
               

        //Save into database table
        $("#btnProcessAdjustment").on("click",function(){
               
              let warehouse_id=$("#cmbWarehouse").val();
			  let user_id=$("#cmbUser").val();
              let adjustment_at=$("#txtAdjustmentDate").val();
              let adjustment_type_id=$("#cmbStockAdjustmentType").val();
			                     
              let remark=$("#txtRemark").val();
              let products=cart.getCart();
               //console.log(adjustment_date);
              
              $.ajax({
                url:'api/StockAdjustmentApi/save',
                type:'POST',
                data:{
                  "cmbWarehouse":warehouse_id,
				          "cmbUser":user_id,
                  "txtAdjustmentDate":adjustment_at,                 
                  "txtAdjustmentType":adjustment_type_id,
                  "txtRemark":remark,                  
                  "txtProducts":products
                },
                success:function(res){
                  console.log(res);
                  cart.clearCart();
				  $("#items").html("");
                }
            });

        });       


        //Show customer other information
        // $("#cmbWarehouse").on("change",function(){
        //    $.ajax({
        //      url:'library/ajax_customer.php',
        //      type:'POST',
        //      data:{"cmbCustomer":$(this).val()},
        //      success:function(res){
        //        $(".customer-info").html(res);;
        //      }
        //    });
        // });      
       
       
      
      
      //Add item to bill temporarily
        $("#btnAddToCart").on("click",function(){
           
            let item_id=$("#cmbRawMaterial").val(); 
            let name=  $("#cmbRawMaterial option:selected").text();
			let measure=$("#txtMeasure").val();          
            let price=$("#txtPrice").val();
            let uom_id=$("#cmbUom").val();
			let uom_name=$("#cmbUom option:selected").text();
            let subtotal = price * measure;
                    

            let item={"name":name,
				"item_id":item_id,
				"price":price,
				"measure":parseFloat(measure),
				"uom_id":uom_id,
				"uom_name":uom_name,
				"subtotal":subtotal}; 

             cart.save(item);
             printCart();        
          
        });      


        $("body").on("click",".delete",function(){
           let id=$(this).data("id");        
           cart.delItem(id)
           printCart();
        });
     
        $("#clearAll").on("click",function(){
          cart.clearCart();
          printCart();
        });


    //------------------Cart Functions----------//     


    function printCart(){
         
           let adjustments= cart.getCart();            
           let sn=1;          
           let $bill="";  
           let subtotal=0;

           if(adjustments!=null){  
                        
          
             adjustments.forEach(function(item,i){
            //$.each(adjustments,function(i,item){
                  //console.log(item.name);
             
              subtotal+=item.price*item.measure;
              let $html="<tr>";            
                  $html+="<td>";
                  $html+=sn;
                  $html+="</td>";
                  $html+="<td>";
                  $html+=item.name;
                  $html+="</td>";
                  $html+="<td data-field='price'>";
                  $html+=item.price;
                  $html+="</td>";
                  $html+="<td data-field='measure'>";
                  $html+=item.measure;
                  $html+="</td>";
              	  $html+="<td data-field='uom_name'>";
              	  $html+=item.uom_name;
              	  $html+="</td>";
              	  $html+="<td data-field='subtotal'>";
              	  $html+=item.subtotal;
              	  $html+="</td>";
              	  $html+="<td>";
              	  $html+="<input type='button' class='delete' data-id='"+item.item_id+"' value='-'/>";
              	  $html+="</td>";
              	  $html+="</tr>";
              	  $bill+=$html;
              sn++;
             });      
          
           } 
           
          
           $("#items").html($bill); 

           //Order Summary
           $("#subtotal").html(subtotal);
           //let tax=(subtotal*0.05).toFixed(2);
          // $("#tax").html(tax);
           $("#net-total").html(parseFloat(subtotal));
        }


      });
  </script>
  <script src="js/cart.js"></script>
