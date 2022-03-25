<div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="/" class="simple-text logo-normal">
          Admin Panel
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="nav-item <?php if(!strcmp($_SERVER['REQUEST_URI'],"/")){echo "active";}?>">
            <a class="nav-link" href="./">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"/add_servers.php")){echo "active";}?>">
            <a class="nav-link" href="add_servers.php">
              <i class="material-icons">add</i>
              <p>Add Server</p>
            </a>
          </li>
          <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"/free_servers.php")){echo "active";}?>">
            <a class="nav-link" href="free_servers.php">
              <i class="material-icons">public</i>
              <p>Free Servers</p>
            </a>
          </li>
          <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"/pro_servers.php")){echo "active";}?>">
            <a class="nav-link" href="pro_servers.php">
              <i class="material-icons">attach_money</i>
              <p>Pro Servers</p>
            </a>
          </li>
		  <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"/add_ads.php?edit=5")){echo "active";}?>">
            <a class="nav-link" href="add_ads.php">
              <i class="material-icons">add</i>
              <p>Add Ads Config</p>
            </a>
          </li>
          <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"/ads_list.php")){echo "active";}?>">
            <a class="nav-link" href="ads_list.php">
              <i class="material-icons">track_changes</i>
              <p>Ads Config List</p>
            </a>
          </li>
          <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"/add_users.php")){echo "active";}?>">
            <a class="nav-link" href="add_users.php">
              <i class="material-icons">person</i>
              <p>Register User</p>
            </a>
          </li>
            <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"change_password.php")){echo "active";}?>">
                <a class="nav-link" href="change_password.php">
                    <i class="material-icons">settings</i>
                    <p>Change Password</p>
                </a>
            </li>
            <li class="nav-item  <?php if(!strcmp($_SERVER['REQUEST_URI'],"includes/api.php?logout=1")){echo "active";}?>">
                <a class="nav-link" href="includes/api.php?logout=1">
                    <i class="material-icons">key</i>
                    <p>Logout</p>
                </a>
            </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
