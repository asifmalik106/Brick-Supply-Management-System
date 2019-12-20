<body>
<?php include 'asset/includes/customer-sidebar.php';?>
  <div class="container">
    <div class="row">
      <h2 align="center">
      <?php 
        if($data['result']==TRUE){
          echo "Congratulations! New Order Added Successfully";
        }else{
          echo "Sonething went wrong!! Please Try again... :(";
        }
      ?>
      </h2>
      <h4 align="center"><a href="<?php echo BASE_URL; ?>customer">CLICK HERE</a> to go to Order Page.</h4>
    </div>
  </div>
</body>