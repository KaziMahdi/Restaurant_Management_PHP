<?php
if (isset($_POST["btnDetails"])) {
  $expense = Expenstion::find($_POST["txtId"]);
  $employee = Employee::find($expense->employee_id);
  $booking = Booking::find($expense->booking_id);
}
?>
<style>
  #cmbCustomer {
    padding: 5px;
  }
  /* table,tr,td,input{
    width: 50px;
  } */
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Expense Details</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Expense Details</li>
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
                <small class="float-right">Date: <?php echo $expense->sale_date; ?></small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-3 invoice-col">
              From
              <address>
                <strong>KAZI-RESTAURANT, Inc.</strong><br>
                House:12, Road:1<br>
                Block:E<br>
                Mobile: 017834433<br>
                Email: Kazi@ishop.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
              <b>Customer</b>
              <address>
                <?php
                echo $employee->name;
                ?>

                <div id="customer-info"></div>

              </address>
              
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
              <b>Booking</b>
              <address>
                <?php
                echo $booking->name;
                ?>

                <div id="booking-info"></div>

              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">

              <table>
                <tr>
                  <td><b>Expense ID:</b></td>
                  <td><input type="text" style="width:60px" value="<?php echo $expense->id; ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Expense Date:</b></td>
                  <td><input type="text" id="txtOrderDate" style="width:90px" value=<?php echo $expense->prepare_date; ?>/></td>
                  
                </tr>
                <tr>
                <td><b>Sale Date:</b></td>
                  <td><input type="text" id="txtOrderDate" style="width:90px" value=<?php echo $expense->sale_date; ?>/></td>
                  
                </tr>
                
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
                    <th>Menu</th>
                    <th>Material</th>
                    <th>Measure</th>
                    <th>Uom</th>
                    
                    <th></th>
                  </tr>

                </thead>
                <tbody>
                  <?php
                  $expenseDetails = ExpenstionDetaile::all_by_expense_id($expense->id);
                  
                  $i = 1;
                  $sub_total = 0;
                  foreach ($expenseDetails as $line) {
                    $line_total =$line->measure;
                    
                    
                    echo "<tr><th>" . $i++ . "</th>
						   <td>{$line->name}</td>
						   <td>{$line->rname}</td>
						   <td>{$line->measure}</td>                     
						   <td>{$line->uname}</td>						   
						   
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
              <textarea id="txtRemark" readonly><?php echo $expense->remark; ?></textarea>
            </div>
            <!-- /.col -->
            <div class="col-6">
              

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal"><?php
                                        echo $line_total;
                                        ?></td>
                    </tr>


                    <tr>
                      <th>Total:</th>
                      <td id="net-total"><?php
                                          echo $line_total;
                                          ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="javascript:void(0)" onclick="print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              <button type="button" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
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