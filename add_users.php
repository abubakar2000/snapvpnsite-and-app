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
            <form method="POST" action="add_users.php" style="width:25%">
                <input type="number" id="toReg" name="toReg" class="form-control" placeholder="Number of users to register"/>
                <input type="number" id="toRegDays" name="toRegDays" class="form-control" placeholder="Number of days"/>
                <button class="btn btn-primary" style="width:100%">ADD</button>
            </form>
            
            <form method="POST" action="add_users.php" style="width:25%">
                <button class="btn btn-warning" style="width:100%">Refresh</button>
            </form>

            <div class="row">
            <!-- Servers Table -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Bulk Add</h4>
                  <p class="card-category">Add users to register</p>
                </div>
                <div class="card-body">
                    
                  
                  <form method="POST" action=<?php if (isset($_POST["toReg"])) {
                      echo "bulk_register.php?count=".$_POST["toReg"];
                  } ?> class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Email</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Days</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      if (isset($_POST["toReg"])) {
                          $count = $_POST["toReg"];
                      }else{
                          $count = 0;
                      }
                      if (isset($_POST["toRegDays"])) {
                          $days = $_POST["toRegDays"];
                      }else{
                          $days = 0;
                      }
                      $i = 1;
                      if($count > 0){
                      while ($i <= $count) {
                    ?>
                        <tr  class="configuration">
                          <td>
                            <?php echo $i;?>
                          </td>
                          <td>
                          <input class="form-control" value=<?php echo $i.substr(uniqid(mt_rand(0,100),FALSE),-3,-1).substr($_SERVER['REQUEST_TIME'],-3.-1)."@email.com"; ?> name=<?php  echo $i."_email" ?> id=<?php echo $i."_email" ?> placeholder="email"/>
                          </td> 
                          
                          <td>
                            <input class="form-control" value=<?php echo $i.substr(uniqid(mt_rand(0,100),FALSE),-3,-1).substr($_SERVER['REQUEST_TIME'],-3.-1); ?> name=<?php echo $i."_username" ?> id=<?php echo $i."_username" ?> placeholder="Username"/>
                          </td>

                          <td>
                          <input class="form-control" value=<?php echo substr($_SERVER['REQUEST_TIME'],0,5) ?> name=<?php echo $i."_password" ?> id=<?php echo $i."_password" ?> placeholder="Password"/>

                          </td>

                          <td>
                          <input class="form-control" value=<?php echo substr(uniqid($i,FALSE),0,8) ?> name=<?php echo $i."_firstname" ?> id=<?php echo $i."_firstname" ?> placeholder="First Name"/>

                          </td>

                          <td>
                          <input class="form-control" value=<?php echo substr(uniqid($i,FALSE),0,8) ?> name=<?php echo $i."_lastname" ?> id=<?php echo $i."_lastname" ?> placeholder="Last Name"/>

                          </td>
                          <td>
                          <input class="form-control" value=<?php echo $days ?> name=<?php echo $i."_days" ?> type="number" id=<?php echo $i."_days" ?> placeholder="Days"/>

                          </td>
                        </tr>
                        <?php 
                        $i++;
                      }
                    }else{
                      echo "<tr><td>No users saved!</td></tr>";
                    }
                      ?>
                      </tbody>
                    </table>
                    <button <?php if ($count <= 0) {
                        echo "disabled";
                    } ?> class="btn btn-success" type="submit">Register</button>
                  </form>

                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Servers Table -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Users List</h4>
                  <p class="card-category"> List of Registered Users</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          #
                        </th>
                        <th>
                          Username	
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          First Name
                        </th>
                        <th>
                          Last Name
                        </th>
                        <th>
                          Password
                        </th>
                        <th>
                          Days Left
                        </th>
                      </thead>
                      <tbody>
                      <?php 
                      $query = $DBcon->query("SELECT * FROM users");
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
                            <?php echo $row['username'];?>
                          </td>

                          <td>
                          <?php echo $row['email'];?>
                          </td>

                          <td>
                          <?php echo $row['Firstname'];?>
                          </td>

                          <td>
                          <?php echo $row['Lastname'];?>
                          </td>
                            <td>
                            <?php echo $row['password'];?>
                            </td>
                            <td>
                            <?php echo $row['Days'];?>
                            </td>
							<td>
                              <a type="button" rel="tooltip" title="Delete Users" href="delete_user.php?user=<?php echo $row['username']?>" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </a>
							</td>
							<td>
                              <a type="button" rel="tooltip" title="Delete Users" href="reset_timer.php?user=<?php echo $row['username']?>" class="btn btn-primary btn-link btn-sm">
                                Reset
                              </a>
							</td>
                        </tr>
                        <?php 
                        $i++;
                      }
                    }else{
                      echo "<tr><td>No Users saved!</td></tr>";
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




