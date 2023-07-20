<style>
  #cmbCustomer {
    padding: 5px;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Expenstion</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Create Expenstion</li>
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
                <small class="float-right">Date: <?php echo date("d M Y") ?></small>
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
                Email: kazi@ishop.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
              Employee
              <address>
                <?php
                echo Employee::html_select("cmbEmployee");
                ?>

                <div id="employee-info"></div>

              </address>
              
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
              Booking
              <address>
                <?php
                echo Booking::html_select("cmbBooking");
                ?>

                <div id="booking-info"></div>

              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">

              <table>
                <tr>
                  <td><b>Prepare ID:</b></td>
                  <td><input type="text" style="width:60px" value="<?php echo Order::get_last_id() + 1; ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Prepare Date:</b></td>
                  <td><input type="text" id="txtPrepareDate" value=<?php echo date("d-m-Y"); ?> style="width:96px ;" /></td>
                </tr>
                <tr>
                  <td><b>Sale Date:</b></td>
                  <td><input type="text" id="txtSaleDate" value=<?php echo date("d-m-Y"); ?> style="width:96px ;" /></td>
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
                    <th>Product</th>                   
                    <th>Material</th>
                    <th>Mesure</th>
                    <th>Uom</th>
                    
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                   <th></th>
                   <th><?php 
                   echo Menu::html_select("cmbMenu");?>
                   </th>
                    <th>
                    <?php
                      echo RawMaterial::html_select("cmbMaterial");
                      ?>
                    </th>
                    
                    <th><input type="text" id="txtMeasure" /></th>
                    <th><?php echo Uom::html_select("cmbUom");
                      ?>
                  
                    </th>
                    <th></th>
                    <th><input type="button" id="btnAddToCart" value=" + " /></th>
                  </tr>
                </thead>
                <tbody id="items">

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
                      <th>Total:</th>
                      <td id="net-total">0</td>
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
              <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
<script>
  $(function() {

    const cart = new Cart("order");

    printCart();

    //Show calander in textbox
    $("#txtPrepareDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $("#txtSaleDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });


    //Save into database table
    $("#btnProcessOrder").on("click", function() {

      let employee_id = $("#cmbEmployee").val();
      let booking_id = $("#cmbBooking").val();
      let prepare_date = $("#txtPrepareDate").val();
      let sale_date = $("#txtSaleDate").val();
      let remark = $("#txtRemark").html();
      let prepare_total = $("#net-total").text();
      
      let material = cart.getCart();
      
        // console.log(prepare_date);

      $.ajax({
        url: 'api/ExpenstionApi/save',
        type: 'POST',
        data: {
          "employee_id": employee_id,
          "booking_id": booking_id,
          "prepare_date": prepare_date,
          "sale_date": sale_date,
          "remark": remark,
          "prepare_total": prepare_total,
          "material": material

          
        },
        
        success: function(res) {
          console.log(res);
          cart.clearCart();
          $("#items").html("");
        }
      });

    });


    //Show customer other information
    $("#cmbEmployee").on("change", function() {
      $.ajax({
        url: 'api/EmployeeApi/find',
        type: 'GET',
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          let data = JSON.parse(res);
          
          let employee = data.employee;

          $("#employee-info").html(employee.pname + "<br>"+"<b>Shift:</b>" + employee.sname);
        }
      });
    }); //

    //Show Booking other information
    $("#cmbBooking").on("change", function() {
      $.ajax({
        url: 'api/BookingApi/find',
        type: 'GET',
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          let data = JSON.parse(res);
          
          let booking = data.booking;

          $("#booking-info").html(booking);
        }
      });
    }); //    

    //Show customer other information
    // $("#cmbMaterial").on("change", function() {

    //   $.ajax({
    //     url: 'api/RawmaterialApi/find',
    //     type: 'GET',
    //     data: {
    //       "id": $(this).val()
    //     },
    //     success: function(res) {
    //       console.log(res)
    //       let data = JSON.parse(res);
    //       let material = data.materials;

    //       $("#txtUom").val(material.uname);
          
    //     }
    //   });

    // }); //  


    //Add item to bill temporarily       


    $("#btnAddToCart").on("click", function() {

      let item_id = $("#cmbMenu").val();
      let name = $("#cmbMenu option:selected").text();
      let mt_id = $("#cmbMaterial").val();
      let mname = $("#cmbMaterial option:selected").text();      
      let measure = $("#txtMeasure").val();
      let uom_id= $("#cmbUom").val();
       
      let uom_name=$("#cmbUom option:selected").text();
      

      let total = measure + uom_name ;
      

      let item = {
        "name": name,
        "item_id": item_id,
        "mt_id":mt_id,
        "mname": mname,
        "measure": measure,
        "uom_id":uom_id,
        "uom_name": uom_name,
        
        "total":total
        
      };

      cart.save(item);

      printCart();

    });

    $("body").on("click", ".delete", function() {
      let id = $(this).data("id");
      cart.delItem(id)
      printCart();
    });

    $("#clearAll").on("click", function() {
      cart.clearCart();
      printCart();
    });


    //------------------Cart Functions----------//     


    function printCart() {

      let orders = cart.getCart();
      let sn = 1;
      let $bill = "";
      let total="";
      

      if (orders != null) {

        orders.forEach(function(item, i) {
          //console.log(item.name);
          total += item.measure + item.uom_name;

          let $html = "<tr>";
          $html += "<td>";
          $html += sn;
          $html += "</td>";
          $html += "<td>";
          $html += item.name;
          $html += "</td>";

          $html += "<td>";
          $html += item.mname;
          $html += "</td>";
          
          $html += "<td>";
          $html += item.measure;
          $html += "</td>";
          $html += "<td>";
          $html += item.uom_name;          
          $html += "<td>";
          $html += "<td>";
          $html += item.total;          
          $html += "<td>";
          $html += "<input type='button' class='delete' data-id='" + item.item_id + "' value='-'/>";
          $html += "</td>";
          $html += "</tr>";
          $bill += $html;
          sn++;
        });
      }

      $("#items").html($bill);
      $("#net-total").html(total);
     
    }



  });
</script>
<script src="js/cart.js"></script>