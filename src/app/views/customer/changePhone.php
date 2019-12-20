<body>
<?php include 'asset/includes/customer-sidebar.php';?>
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">

        <form method="POST" action="<?php echo BASE_URL; ?>customer/changeMobile">
          <div class="form-group">
            <label>New Phone Number</label>
            <input class="form-control" name="newPhone">
          </div>
          <button type="submit" class="btn btn-primary">Update Phone Number</button>
        </form>
      </div>

    </div>
  </div>
</body>