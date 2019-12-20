<body>
<?php include 'asset/includes/sidebar.php';?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>OrderID</th>
              <th>Date</th>
              <th>Customer</th>
              <th>Brick Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Trx Note</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($row = $data['order']->fetch_assoc()){
                if($row['orderStatus']=="approved"){
                  echo "<tr>";
                }else if($row['orderStatus']=="cancelled"){
                  echo "<tr>";
                }else if($row['orderQuantity']>$row['brickQuantity']){
                  echo '<tr style="background-color: #FFCDD2">';
                }
                else{
                  echo '<tr style="background-color: #C8E6C9">';
                }
                
                echo "<td>".$row['orderID']."</td>";
                echo "<td>".$row['orderDate']."</td>";
                echo "<td>".$row['customerName']."</td>";
                echo "<td>".$row['brickName']."</td>";
                echo "<td>".$row['brickPrice']."</td>";
                echo "<td>".$row['orderQuantity']."</td>";
                echo "<td>".$row['brickPrice']*$row['orderQuantity']."</td>";
                echo "<td>".$row['orderPayment']."</td>";
                if($row['orderStatus']=="pending"){
                  echo '<td><a href="'.BASE_URL.'admin/approve/'.$row['orderID'].'" class="btn btn-xs btn-success">Confirm</a><a href="'.BASE_URL.'admin/cancel/'.$row['orderID'].'" class="btn btn-xs btn-danger">Cancel</a></td>';
                }
                echo "<td>".$row['orderStatus']."</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>

      </div>
      
    </div>
  </div>
</body>