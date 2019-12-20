<body>
<?php include 'asset/includes/sidebar.php';?>
  <div class="container">
    <div class="row">
      <h2 align="center">
      <?php 
        if($data['result']=="approve"){
          echo "Congratulations! Order Approved Successfully";
        }else if($data['result']=="cancel"){
          echo "Order Cancelled!!! :(";
        }
        else{
          echo "Sonething went wrong!! Please Try again... :(";
        }
      ?>
      </h2>
      <h4 align="center"><a href="<?php echo BASE_URL; ?>admin/">CLICK HERE</a> to view Order List.</h4>
    </div>
  </div>
</body>