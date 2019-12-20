<body>
  <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 align="center">Customer Signup Form</h4>
          </div>
          <div class="panel-body">
            <form class="form" method="POST" action="<?php echo BASE_URL; ?>main/customer/">
              <div class="form-group">
                <label>Customer Name</label>
                <input class="form-control" name="customerName" required>
              </div>
              <div class="form-group">
                <label>Customer Address</label>
                <input class="form-control" name="customerAddress"required>
              </div>
              <div class="form-group">
                <label>Customer Mobile</label>
                <input class="form-control" name="customerMobile"required>
              </div>
              <div class="form-group">
                <label>Customer Email</label>
                <input class="form-control" name="customerEmail" required>
              </div>
              <div class="form-group">
                <label>Customer Password</label>
                <input class="form-control" type="password" name="customerPassword"required>
              </div>
              
              <button class="btn btn-primary" type="submit"> Signup Now!</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>