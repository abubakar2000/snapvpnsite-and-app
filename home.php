<?php
include('includes/header.php');


    if(isset($_GET['delete'])){
        if($query = $DBcon->query("DELETE FROM `servers` WHERE `servers`.`id` =".$_GET['delete'])){
            header('Location:home.php?status=success&message=Server deleted succesful');
        }else{
            echo $DBcon->error;

            header('Location:home.php?status=error&message=Error can\'t delete server');
        }
    }

    if(isset($_GET['delete_ads'])){
        if($query = $DBcon->query("DELETE FROM `admobconfig` WHERE `admobconfig`.`id` =".$_GET['delete_ads'])){
            header('Location:home.php?status=success&message=Ads config deleted succesful');
        }else{
            echo $DBcon->error;

            header('Location:home.php?status=error&message=Error can\'t delete ads config');
        }
    }


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
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">dns</i>
                                </div>
                                <p class="card-category">Total Servers</p>
                                <h3 class="card-title"><?php echo $total;?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">public</i>
                                </div>
                                <p class="card-category">Free Servers</p>
                                <h3 class="card-title"><?php echo $free;?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">attach_money</i>
                                </div>
                                <p class="card-category">Pro Servers</p>
                                <h3 class="card-title"><?php echo $pro;?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- Admob Table -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Ads Configurations</h4>
                            <p class="card-category">Edit ads configurations for application</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
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
                                        Reward ID
                                    </th>
                                    <th>
                                        Active
                                    </th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = $DBcon->query("SELECT * FROM admobconfig");
                                    $count = mysqli_num_rows($query);
                                    $i = 0;
                                    if($count > 0){
                                        while ($row = $query->fetch_assoc()) {
                                            ?>
                                            <tr>
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
                                                    <a type="button" rel="tooltip" title="Delete Ads" href="home.php?delete_ads=<?php echo $row['id']?>" class="btn btn-danger btn-link btn-sm">
                                                        <i class="material-icons">close</i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }else{
                                        echo "<tr><td>No admob configuration saved!</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Servers Table -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">List of Servers</h4>
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
                                    $query = $DBcon->query("SELECT * FROM servers");
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

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .alert {
        padding: 20px;
        background-color: #ffd117;
        color: #000000;
    }

    .closebtn {
        margin-left: 15px;
        color: #000000;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>


</html>
