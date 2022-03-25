<?php 
include('includes/header.php');
$is_edit = false;
$admobID =  "";
$bannerID =  "";
$interstitialID =  "";
$nativeID =  "";
$RewardedAdID = "";
//$adType =  "";
$activeAd =  "";
$id = 0;

if(isset($_GET['edit']))
{
  $is_edit = true;
  $id = $_GET['edit'];
  $query = $DBcon->query("SELECT * FROM admobconfig WHERE id='".$_GET['edit']."'");
  $row=$query->fetch_array();
  $count = $query->num_rows; 
  $admobID =  $row['admobID'];
  $bannerID =  $row['bannerID'];
  $interstitialID =  $row['interstitialID'];
  $nativeID =  $row['nativeID'];
  $RewardedAdID =  $row['RewardedAdID'];
 // $adType =  $row['adType'];
  $activeAd =  $row['activeAd'];
}
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
<h4 class="card-title"><?php if($is_edit){ echo "Edit Ads Config"; }else{ echo "Add Ads Config"; }?></h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="includes/routes.php">
                    <div class="row">					  
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ads ID</label>
                          <input type="text" value="<?php echo $admobID; ?>" name="admobID" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Banner ID</label>
                          <input type="text" value="<?php echo $bannerID; ?>" name="bannerID" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Interstitial ID</label>
                          <input type="text" value="<?php echo $interstitialID; ?>" name="interstitialID" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Native ID</label>
                          <input type="text"  value="<?php echo $nativeID; ?>"name="nativeID" class="form-control">
                        </div>
                      </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Rewarded ID</label>
                                <input type="text"  value="<?php echo $RewardedAdID; ?>"name="RewardedAdID" class="form-control">
                            </div>
                        </div>


                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">ActiveAd</label>
                            <select name="activeAd" class="form-control">
                              <option value="1" <?php if($activeAd==1){echo "selected";} ?>>Active</option>
                              <option value="0"  <?php if($activeAd==0){echo "selected";} ?>>Not Active</option>
                            </select>
                        </div>
                      </div>
                      <input type="text" value="<?php echo $id; ?>" name="id" style="display:none" class="form-control">

                    </div>
                    <button type="submit" name="<?php if($is_edit){echo "editAds";}else{echo "addAds";}?>" class="btn btn-primary pull-right"><?php if($is_edit){echo "Edit";}else{echo "Add";}?></button>
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