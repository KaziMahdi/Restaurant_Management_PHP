<style>
  select{
    padding: 5px;
    min-width:200px;
  }
  textarea{width: 100%;}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Create Purchase</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Create Purchase</li>
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
                <small class="float-right">Date: <?php echo date("d M Y") ?></small>
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
                  echo Supplier::html_select("cmbSupplier");
                ?>

                <div id="supplier-info"></div>

              </address>
              <div>
                Shipping Address:<br>
                <textarea id="txtShippingAddress" style="width:50%;"></textarea>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

              <table>
                <tr>
                  <td><b>Purchase ID:</b></td>
                  <td><input type="text" style="width:60px" value="<?php echo Purchase::get_last_id() + 1; ?>" readonly /></td>
                </tr>
                <tr>
                  <td><b>Purchase Date:</b></td>
                  <td><input type="text" style="width:90px" id="txtPurchaseDate" value=<?php echo date("d-m-Y"); ?> /></td>
                </tr>
                <tr>
                  <td><b>Delivery Date:</b></td>
                  <td><input type="text" style="width:90px" id="txtDeliveryDate" value=<?php echo date("d-m-Y"); ?> /></td>
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
                    <th>Item</th>
                    <th>Price</th>
                    <th>Measure</th>
                    <th>Uom</th>
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                      <?php
                      echo RawMaterial::html_select();
                      ?>
                    </th>
                    <th><input type="text" id="txtPrice" /></th>
                    <th><input type="text" id="txtMeasure" /></th>
                    <th>
                      <?php echo Uom::html_select();
                      ?>
                    </th>
                    <th><input type="text" id="txtDiscount" /></th>
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
              <textarea id="txtRemark" style="width: 50%;"></textarea>
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
              <button type="button" id="btnProcessPurchase" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Purchase </button>
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

    const cart = new Cart("purchase");

    printCart();

    //Show calander in textbox
    $("#txtPurchaseDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    $("#txtDeliveryDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
   

    //Save into database table
    $("#btnProcessPurchase").on("click", function() {
        
      let supplier_id = $("#cmbSupplier").val();
      
      let purchase_date = $("#txtPurchaseDate").val();
      
      let delivery_date = $("#txtDeliveryDate").val();
      
      let discount = 0;
      
      let vat = 0;
      
      let shipping_address = $("#txtShippingAddress").val();
      
      let remark = $("#txtRemark").val();
      
      let order_total = $("#net-total").text();
      
      let materials = cart.getCart();
      //  console.log(materials);
      $.ajax({
        url: 'api/PurchaseApi/save',
        type: 'POST',
        data: {
          "supplier_id": supplier_id,
          "purchase_date": purchase_date, 
          "delivery_date":  delivery_date,    
          "shipping_address": shipping_address,
          "discount": discount,
          "vat": vat,
          "remark": remark,
          "purchase_total": order_total, 
          "materials": materials
        },
        success: function(res) {
          // console.log(res);
          cart.clearCart();
          $("#items").html("");
                    
        }
      });

    });


    //Show customer other information
    $("#cmbSupplier").on("change", function() {
      $.ajax({
        url: 'api/SupplierApi/find',
        type: 'GET',
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          let data = JSON.parse(res);
          //console.log(data.supplier);
          let supplier = data.supplier;

          $("#supplier-info").html(supplier.mobile + "<br>" + supplier.email);
        }
      });
    }); //    

    // Show customer other information
    $("#cmbRawMaterial").on("change", function() {

      $.ajax({
        url: 'api/RawmaterialApi/find',
        type: 'GET',
        data: {
          "id": $(this).val()
        },
        success: function(res) {
          let data = JSON.parse(res);
          let material=data.raw_material;

        }
      });

    }); //  


    //Add item to bill temporarily       


    $("#btnAddToCart").on("click", function() {
      
      let item_id = $("#cmbRawMaterial").val();
      
      let name = $("#cmbRawMaterial option:selected").text();
      
      let price = $("#txtPrice").val();
      
      let measure = $("#txtMeasure").val();

      let uom_id= $("#cmbUom").val();
       
      let uom_name=$("#cmbUom option:selected").text();
      
      let discount = $("#txtDiscount").val();
      
      let total_discount = discount * measure;
      
      let subtotal = price * measure - total_discount;
      
      let item = {
        "name": name,
        "item_id": item_id,
        "price": price,
        "measure": measure,
        "uom_name":uom_name,
        "uom_id":uom_id,
        "discount": discount,
        'total_discount': total_discount,
        "subtotal": subtotal

      };
console.log(item);

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
      let subtotal = 0;

      if (orders != null) {

        orders.forEach(function(item, i) {
          //console.log(item.name);
          subtotal += item.price * item.measure - item.discount;
          
          let $html = "<tr>";
          $html += "<td>";
          $html += sn;
          $html += "</td>";
          $html += "<td>";
          $html += item.name;
          $html += "</td>";
          $html += "<td data-field='price'>";
          $html += item.price;
          $html += "</td>";
          $html += "<td data-field='measure'>";
          $html += item.measure;
          $html += "</td>";
          $html += "<td data-field='uom'>";
          $html += item.uom_name;
          $html += "</td>";
          $html += "<td data-field='discount'>";
          $html += item.total_discount;
          $html += "</td>";
          $html += "<td data-field='subtotal'>";
          $html += item.subtotal;
          $html += "</td>";
          $html += "<td>";
          $html += "<input type='button' class='delete' data-id='" + item.item_id + "' value='-'/>";
          $html += "</td>";
          $html += "</tr>";
          $bill += $html;
          sn++;
        });
      }

      $("#items").html($bill);

      //Order Summary
      $("#subtotal").html(subtotal);
      let tax = (subtotal * 0.05).toFixed(2);
      
      $("#tax").html(tax);
      $("#net-total").html(parseFloat(subtotal) + parseFloat(tax));
    }



  });
</script>
<script src="js/cart.js"></script>