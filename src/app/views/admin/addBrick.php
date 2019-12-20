<body>
<?php include 'asset/includes/sidebar.php';?>
  <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 align="center">Add New Brick</h4>
          </div>
          <div class="panel-body">
            <form class="form" method="POST" action="<?php echo BASE_URL; ?>admin/brick/new/">
              <div class="form-group">
                <label>Brick Name</label>
                <input class="form-control" name="brickName">
              </div>
              <div class="form-group">
                <label>Brick Unit Price(BDT)</label>
                <input class="form-control" name="brickPrice">
              </div>
              <div class="form-group">
                <label>Brick Quantity(Truck)</label>
                <input class="form-control" name="brickQuantity">
              </div>
              <button class="btn btn-primary" type="submit"> Add New Brick</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>