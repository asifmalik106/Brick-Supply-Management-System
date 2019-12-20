<body>
<?php include 'asset/includes/sidebar.php';?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>CustomerID</th>
              <th>Customer Name</th>
              <th>Customer Address</th>
              <th>Customer Mobile</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              while($row = $data['customer']->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['customerID']."</td>";
                echo "<td>".$row['customerName']."</td>";
                echo "<td>".$row['customerAddress']."</td>";
                echo "<td>".$row['customerMobile']."</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</body>