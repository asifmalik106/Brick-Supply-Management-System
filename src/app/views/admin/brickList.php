<body>
<?php include 'asset/includes/sidebar.php';?>
  <div class="container">
    <div class="row">
      <table class="table table-hover table-bordered" id="brickTable">
        <thead>
          <tr>
            <th>BrickID</th>
            <th>Brick Name</th>
            <th>Brick Price(BDT)</th>
            <th>Available(Truck)</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while($row = $data['brick']->fetch_assoc())
          {
            echo "<tr>";
            echo "<td>".$row['brickID']."</td>";
            echo "<td>".$row['brickName']."</td>";
            echo "<td>".$row['brickPrice']."</td>";
            echo "<td>".$row['brickQuantity']."</td>";
            echo '<td><a class="btn btn-xs btn-primary" href="'.BASE_URL.'admin/brick/edit/'.$row['brickID'].'">Edit</a><a class="btn btn-xs btn-danger" href="'.BASE_URL.'admin/delete/'.$row['brickID'].'">Delete</a></td>';
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>