<?php
if(isset($_POST["btnDetails"])){
	$stockadjustment=StockAdjustment::find($_POST["txtId"]);
	$user=User::find($stockadjustment->user_id);
	$adjustment=StockAdjustmentType::find($stockadjustment->adjustment_type_id);
	$warehouse=Warehouse::find($stockadjustment->werehouse_id);
}
?>
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
            <h1>Adjustment Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Adjustment Details</li>
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
                    <small class="float-right">Date: <?php echo $stockadjustment->adjustment_at; ?></small>
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
                  User
                  <address>
                    <?php
                      echo $user->username;
                    ?>
                   
                   <div id="customer-info"></div>

                  </address>
                  <div>
                    Warehouse:
                    <p>
						<?php
						   echo $warehouse->name;
						?>
					</p>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Adjust ID:</b></td><td><input type="text" style="width:60px" value="<?php  echo $stockadjustment->id;?>"  readonly/></td></tr>
                    <tr><td><b>Adjust Date:</b></td><td><input type="text" id="txtOrderDate" style="width:90px"  value=<?php echo $stockadjustment->adjustment_at;?> /></td></tr>
                    <tr><td><b>Adjust Type:</b></td><td><input type="text" id="txtOrderDate" style="width:90px" value=<?php echo $adjustment->name;?> readonly /></td></tr>
                    
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
                      <th>Uom</th>            
                     
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                    
                    </thead>
                    <tbody>                    
                      <?php
					    $adjustment_details= StockAdjustmentDetail::all_by_adjust_id($stockadjustment->id);
						 
						 $i=1;
						 $sub_total=0;
						 foreach($adjustment_details as $line){
							$line_total=$line->price*$line->measure;
							$sub_total+=$line_total;

                           echo "<tr><th>".$i++."</th>
						   <td>{$line->mname}</td>
						   <td>{$line->measure}</td>
						   <td>{$line->price}</td>                     
						   <td>{$line->uname}</td>                     
						   						   
						   <td>{$line_total}</td>
						   <td></td></tr>";
						 }
					  ?>
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
                 <textarea id="txtRemark" readonly><?php echo $stockadjustment->remark;?></textarea>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal"><?php
						  echo $sub_total;
						?></td>
                      </tr>
                      
                     
                      <tr>
                        <th>Total:</th>
                        <td id="net-total"><?php						
						   echo $sub_total;				
						?></td>
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
                  <a href="javascript:void(0)" onclick="print()"  rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
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