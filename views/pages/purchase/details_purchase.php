<?php
if(isset($_POST["btnDetails"])){
	$purchase=Purchase::find($_POST["txtId"]);
  $supplier=Supplier::find($purchase->supplier_id);
}
?>
<style>
 select{
   padding:5px;
   min-width: 200px;
 }
 textarea{
  width: 100%;
 }
</style>
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Details</li>
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
                    <i class="fas fa-globe"></i> KAZI-RESTAURANT.
                    <small class="float-right">Date: <?php echo $purchase->purchase_date; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                Warehouse<br>
                <?php
                    echo Warehouse::html_select("cmbWarehouse");
                  ?>
                 
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Supplier
                  <address>
                    <?php
                      echo $supplier->name;
                    ?>
                   
                   <div id="supplier-info"></div>

                  </address>
                  <div>
                    Shipping Address:
                    <p>
						<?php
						   echo $purchase->shipping_address;
						?>
					</p>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Purchase ID:</b></td><td><input type="text" style="width:60px" value="<?php  echo $purchase->id;?>"  readonly/></td></tr>
                    <tr><td><b>Purchase Date:</b></td><td><input type="text" id="txtPurchaseDate" value=<?php echo $purchase->purchase_date;?> /></td></tr>
                    <tr><td><b>Delivery Date:</b></td><td><input type="text" id="txtDeliveryDate" value=<?php echo $purchase->delivery_date;?> /></td></tr>
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
                      <th>Product</th>
                      <th>Price</th>
                      <th>Measure</th> 
                      <th>Uom Name</th>                    
                      <th>Discount</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                    
                    </thead>
                    <tbody>                    
                      <?php
					     $purchase_details= PurchaseDetail::all_by_purchase_id($purchase->id);
              //  print_r($purchase_details);
						 $i=1;
						 $sub_total=0;
						 foreach($purchase_details as $line){
							$line_total=$line->price*$line->measure-$line->discount;
							$sub_total+=$line_total;

              

              echo "<tr><th>".$i++."</th>
						   <td>{$line->r_name}</td>
						   <td>{$line->price}</td>
						   <td>{$line->measure}</td>
						   <td>{$line->uom}</td>
						   <td>{$line->discount}</td>						   
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
                 <textarea id="txtRemark" readonly><?php echo $purchase->remark;?></textarea>
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