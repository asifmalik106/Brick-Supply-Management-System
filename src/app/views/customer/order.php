<body>
<?php include 'asset/includes/customer-sidebar.php';?>
  <div class="container">
    <div class="row">
      <form method="POST" action="<?php echo BASE_URL; ?>customer/order/">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Select Brick</th>
              <th>Price (BDT)</th>
              <th>Quantity (Truck)</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select name="brickID" class="form-control" id="brickSelect">
                  <option selected="1" disabled>Select Brick</option>
                  <?php
                  while($row = $data['brick']->fetch_assoc()){
                    echo "<option value='".$row['brickID']."' quantity='".$row['brickPrice']."'>".$row['brickName']." (BDT ".$row['brickPrice'].")</option>"; 
                  }
                  ?>
                </select>
              </td>
              <td id="price">0.0</td>
              <td><input class="form-control" name="quantity" type="number" min="1" id="quantity" oninput="getTotal()"></td>
              <td id="total">0.0</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h3>Total Payable Amount: BDT <pay>0.0</pay></h3>
        <b>Payment Information:</b>
        <p>BRAC BANK LIMITED</p>
        <p>A/C: 1331440012559</p>
        <p>Gulshan Branch.</p>
        <hr>
        <p>DUTCH BANGLA BANK LIMITED</p>
        <p>A/C: 13314400124159</p>
        <p>Gulshan Branch.</p>
        <hr>
        <p>STANDARD CHARTERED</p>
        <p>A/C: 133144001255459</p>
        <p>Gulshan Branch.</p>
        <hr>
        
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Transaction Information</label>
          <textarea name="paymentInfo" class="form-control" rows=5></textarea>
        </div>
        
      </div>
      <button type="submit" class="btn btn-lg btn-primary">Add New Order</button>
      </form>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h3 align="center">Order List</h3>
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <td>OrderID</td>
              <td>Date</td>
              <td>Time</td>
              <td>Brick Name</td>
              <td>Price</td>
              <td>Quantity</td>
              <td>Total</td>
              <td>Payment Info</td>
              <td>Order Status</td>
            </tr>
          </thead>
          <tbody>
            <?php 
            while($row = $data['order']->fetch_assoc()){
              echo '<tr>';
              echo '<td>'.$row['orderID'].'</td>';
              echo '<td>'.$row['orderDate'].'</td>';
              echo '<td>'.$row['orderTime'].'</td>';
              echo '<td>'.$row['brickName'].'</td>';
              echo '<td>'.$row['brickPrice'].'</td>';
              echo '<td>'.$row['orderQuantity'].'</td>';
              echo '<td>'.$row['orderQuantity']*$row['brickPrice'].'</td>';
              echo '<td>'.$row['orderPayment'].'</td>';
              echo '<td>'.$row['orderStatus'].'</td>';
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>