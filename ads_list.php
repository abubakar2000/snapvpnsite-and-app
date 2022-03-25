<?php 
include('includes/header.php');
?>
<body>
  <div class="wrapper ">
    <?php include('includes/sidenav.php')?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include("includes/navbar.php")?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Servers Table -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">List of Ads</h4>
                  <p class="card-category"> Ads information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          #
                        </th>
                        <th>
                          Ads ID	
                        </th>
                        <th>
                          Banner ID	
                        </th>
                        <th>
                          Interstitial ID	
                        </th>
                        <th>
                          Native ID	
                        </th>
                        <th>
                            RewardedAd ID
                        </th>
                        <th>
                          Active
                        </th>
<!--                        <th></th>-->
<!--                        <th></th>-->
                      </thead>
                      <tbody>
                      <?php 
                      $query = $DBcon->query("SELECT * FROM admobconfig");
                      $count = mysqli_num_rows($query);
                      $i = 1;
                      if($count > 0){
                      while ($row = $query->fetch_assoc()) {
                    ?>
                        <tr  class="configuration">
                          <td>
                            <?php echo $i;?>
                          </td>
						  
                          <td>
                            <?php echo $row['admobID'];?>
                          </td>

                          <td>
                          <?php echo $row['bannerID'];?>
                          </td>

                          <td>
                          <?php echo $row['interstitialID'];?>
                          </td>

                          <td>
                          <?php echo $row['nativeID'];?>
                          </td>
                            <td>
                            <?php echo $row['RewardedAdID'];?>
                            </td>

                          <td class="text-center"><?php if(strcmp($row['activeAd'],'1')==0){?><i class="fa fa-check text-success"></i><?php }else{ ?><i class="fa fa-times text-danger"></i><?php }?></td>
                          <td>
                              <a type="button" rel="tooltip" title="Edit Ads" href="add_ads.php?edit=<?php echo $row['id']?>" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </a>
							</td>
							<td>
                              <a type="button" rel="tooltip" title="Delete Ads" href="index.php?delete_ads=<?php echo $row['id']?>" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </a>
							</td>
                        </tr>
                        <?php 
                        $i++;
                      }
                    }else{
                      echo "<tr><td>No ads saved!</td></tr>";
                    }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    <?php include('./includes/footer.php')?>
</body>

</html>