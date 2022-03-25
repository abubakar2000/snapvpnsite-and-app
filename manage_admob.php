<?php 
include('includes/header.php')
?>
<body>
  <div class="wrapper ">
    <?php include('includes/sidenav.php')?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include("includes/navbar.php")?>
      <!-- End Navbar -->
      <div class="content ">
        <div class="container-fluid ">

        <div class="row justify-content-center">
            <div class="col-md-6 ">

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Manage Admob</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="includes/routes.php">
                    <div class="row">
                    <?php
                    $query = $DBcon->query("SELECT * FROM admobconfig where adType = 'ADMOB'");
                      $count = mysqli_num_rows($query);
                      $i = 1;
                      while ($row = $query->fetch_assoc()) {
                    ?>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Admob ID</label>
                          <input type="text" value="<?php echo $row['admobID']?>" name="admobID" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Banner ID</label>
                          <input type="text"  value="<?php echo $row['bannerID']?>"  name="bannerID" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Interstitial ID</label>
                          <input type="text" value="<?php echo $row['interstitialID']?>" name="interstitialID" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Native ID</label>
                          <input type="text" value="<?php echo $row['nativeID']?>" name="nativeID" class="form-control">
                        </div>
                      </div>

                          <div class="col-md-12">
                              <div class="form-group">
                                  <label class="bmd-label-floating">Rewarded ID</label>
                                  <input type="text" value="<?php echo $row['RewardedAdID']?>" name="RewardedAdID" class="form-control">
                              </div>
                          </div>

                      <?php } ?>
                    </div>
                    <button type="submit" name="editAdmob" class="btn btn-primary pull-right">Change</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
            
        </div>
      </div>
    <?php include('./includes/footer.php')?>
</body>


</html>