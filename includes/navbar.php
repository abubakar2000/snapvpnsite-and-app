<?php
  $query = $DBcon->query("SELECT * FROM servers");
  $total = mysqli_num_rows($query);
  $query = $DBcon->query("SELECT * FROM servers WHERE isFree = 1");
  $free = mysqli_num_rows($query);
  $query = $DBcon->query("SELECT * FROM servers WHERE isFree = 0");
  $pro = mysqli_num_rows($query);

?>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?php if(!strcmp($_SERVER['REQUEST_URI'],"/")){echo "Dashboard";}else if(!strcmp($_SERVER['REQUEST_URI'],"/add_servers.php")){echo "Add Server";}else if(!strcmp($_SERVER['REQUEST_URI'],"/manage_admob.php")){echo "Manage Admob";}else if(!strcmp($_SERVER['REQUEST_URI'],"/change_password.php")){echo "Change Password";}?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="change_password.php">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="includes/api.php?logout=1">Log out</a>
                </div>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <?php
          if(isset($_GET['status'])){
            if(strcmp($_GET['status'],'success') == 0){
        ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
          </button>
          <span>
            <b> Success - </b> <?php echo $_GET['message']; ?></span>
        </div>
        <?php 
            }else{
              ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <i class="material-icons">close</i>
                </button>
                <span>
                  <b> Error - </b> <?php echo $_GET['message']; ?></span>
              </div>              
              <?php
            }
          }
        ?>
