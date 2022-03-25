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
                  <h4 class="card-title ">List of Free Servers</h4>
                  <p class="card-category"> Server configuration information</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          #
                        </th>
                        <th>
                          Server Name
                        </th>
                        <th>
                          Flag URL
                        </th>
                        <th>
                          OVPN Config.
                        </th>
                        <th>
                          VPN Username
                        </th>
                        <th>
                          VPN Password
                        </th>
                        <th>
                          Free
                        </th>
                        <th>
                          Premium
                        </th>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                      <?php 
                      $query = $DBcon->query("SELECT * FROM servers WHERE isFree = 1");
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
                            <?php echo $row['serverName'];?>
                          </td>
                          <td>
                          <?php echo $row['flagURL'];?>
                          </td>
                          <td>
                          <?php echo substr($row['ovpnConfiguration'],0,45);?>
                          </td>
                          <td>
                          <?php echo $row['vpnUserName'];?>
                          </td>
                          <td>
                          <?php echo $row['vpnPassword'];?>
                          </td>
                          <td class="text-center"><?php if(strcmp($row['isFree'],'1')==0){?><i class="fa fa-check text-success"></i><?php }else{ ?><i class="fa fa-times text-danger"></i><?php }?></td>
                          <td class="text-center"><?php if(strcmp($row['isFree'],'0')==0){?><i class="fa fa-check text-success"></i><?php }else{ ?><i class="fa fa-times text-danger"></i><?php }?></td>
                          <td class="td-actions text-right">
                              <a type="button" rel="tooltip" title="Edit Server" href="add_servers.php?edit=<?php echo $row['id']?>" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </a>
                              <a type="button" rel="tooltip" title="Delete Server" href="home.php?delete=<?php echo $row['id']?>" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </a>
                            </td>
                        </tr>
                        <?php 
                        $i++;
                      }
                    }else{
                      echo "<tr><td>No server saved!</td></tr>";
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