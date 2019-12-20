<body>
<?php include 'asset/includes/sidebar.php';?>
  <div class="container">
    <div class="row">
      <h2 align="center">
      <?php 
        if($data['result']==TRUE){
          echo "Congratulations! New Brick Added Successfully";
        }else{
          echo "Sonething went wrong!! Please Try again... :(";
        }
      ?>
      </h2>
      <h4 align="center"><a href="<?php echo BASE_URL; ?>admin/brick/add/">CLICK HERE</a> to add new Brick.</h4>
      <h4 align="center"><a href="<?php echo BASE_URL; ?>admin/brick/">CLICK HERE</a> to view Brick List.</h4>
    </div>
  </div>
</body>