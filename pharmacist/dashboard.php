<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pmspid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>
   Pharmacy Management System - Pharmacist Dashboard
  </title>
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="">
 <?php include_once('includes/navbar.php');?>
  <div class="main-content">
    <!-- Navbar -->
    <?php include_once('includes/sidebar.php');?>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
                <div class="col-xl-4 col-lg-6" >
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <?php
//todays sale
                   $phid=$_SESSION['pmspid'];
 $query4=mysqli_query($con,"select tblcart.ProductQty as ProductQty,tblmedicine.Priceperunit
 from tblcart join tblmedicine  on tblmedicine.ID=tblcart.ProductId 
 where date(CartDate)=CURDATE() and tblcart.PharmacistId='$phid'");
while($row=mysqli_fetch_array($query4))
{
$todays_sale=$row['ProductQty']*$row['Priceperunit'];
$todysale+=$todays_sale;

}
 ?>
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><a href="pharmacist-report-ds.php">todays sale</a></h5>
                      <span class="h2 font-weight-bold mb-0">Rs. <?php echo $todysale;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
                  <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <?php
//Yesterday's sale
 $query5=mysqli_query($con,"select tblcart.ProductQty as ProductQty,tblmedicine.Priceperunit
 from tblcart 
  join tblmedicine  on tblmedicine.ID=tblcart.ProductId where date(CartDate)=CURDATE()-1 and tblcart.PharmacistId='$phid'");
while($row5=mysqli_fetch_array($query5))
{
$yesterdays_sale=$row5['ProductQty']*$row5['Priceperunit'];
$yesterdaysale+=$yesterdays_sale;

}
 ?>
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><a href="pharmacist-report-ds.php">Yesterday's sale</a></h5>
                      <span class="h2 font-weight-bold mb-0">Rs. <?php echo $yesterdaysale;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fa fa-plus-square"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                   <?php

//Total Sale
 $query7=mysqli_query($con,"select tblcart.ProductQty as ProductQty,tblmedicine.Priceperunit
 from tblcart 
  join tblmedicine  on tblmedicine.ID=tblcart.ProductId where  tblcart.PharmacistId='$phid'");
while($row7=mysqli_fetch_array($query7))
{
$total_sale=$row7['ProductQty']*$row7['Priceperunit'];
$totalsale+=$total_sale;

}
 ?>
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"><a href="pharmacist-report-ds.php">Total sale</a></h5>
                      <span class="h2 font-weight-bold mb-0">Rs. <?php echo $totalsale;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
       
            
          </div>
          </div>
        </div>
   
          
        
      </div>
     
      <?php include_once('includes/footer.php');?>
    </div>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>
<?php }  ?>