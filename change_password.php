<?php 
include('includes/header.php')
?>
<body>
  <div class="wrapper ">
    <?php include('includes/sidenav.php')?>
    <div class="main-panel">
      <?php include("includes/navbar.php")?>
      <div class="content ">
        <div class="container-fluid ">

        <div class="row justify-content-center">
            <div class="col-md-6 ">

          <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="includes/routes.php">
                    <div class="row">


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Previous Passowrd</label>
                          <input type="text" name="previousPassword" class="form-control" required>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">New Passowrd</label>
                          <input type="text" id="newPassword" name="newPassword" class="form-control" required>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">New Passowrd</label>
                          <input type="text" id="confirmPassword" name="confirmPassword" class="form-control" required>
                        </div>
                      </div>

                    </div>
                    <button type="submit" name="changePassword" class="btn btn-primary pull-right">Change</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>

        </div>
      </div>
    <?php include('./includes/footer.php')?>
</body>

</html>