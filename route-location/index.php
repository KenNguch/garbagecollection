<html>
<head>
	<title>Route Map Allocation</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/googlemap.js"></script>
	<style type="text/css">
		.container {
			height: 600px;
		}
		#map {
			width: 100%;
			height: 100%;
			border: 1px solid blue;
		}
		#data, #allData {
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">
			<?php 
			require 'education.php';
			$edu = new education;
			$coll = $edu->getCollegesBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';
			$allData = $edu->getAllColleges();
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';			
		 ?>
		<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="#"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="customers_view.php"><i class="fa fa-users"></i>Customers</a>
                    </li>
					<li>
                        <a href="bookings_view.php"><i class="fa fa-money"></i>Bookings</a>
                    </li>
                    <li>
                        <a href="trucks_view.php"><i class="fa fa-truck"></i>trucks</a>
                    </li>
                    
                    <li>
                        <a href="slots_view.php"><i class="fa fa-sitemap"></i>slots</a>
                    </li>
                    <li>
                        <a href="availability_view.php"><i class="fa fa-check-circle"></i> Availability</a>
                    </li>
                    <li>
                        <a href="routes_view.php"><i class="fa fa-road"></i> Routes</a>
                    </li>
                    <li>
                        <a href="/route-location/index.php"><i class="fa fa-sitemap"></i>Pick Up Areas</a>
                    </li>
                    
        
                    </li>
                    <?php $currentuser=getLoggedMemberID();
                    if($currentuser=="admin"){
                    echo' <li>
                        <a href="hooks/summary-reports.php"><i class="fa fa-list"></i> Reports</a>
                    </li>';
                }
                    ?>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Welcome  <small> <?php echo getLoggedMemberID();?></small>
                        </h1>
                        <?php alertcheck(); ?>
                    </div>
                  </div> 
                 <?php include("main.php");?>
                 <!-- /. ROW  -->
				 <footer><strong><p>Garbage Kollectorz System .All rights reserved. @ 2019</p></strong></footer>
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
		<div id="map"></div>
	</div>
</body>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1bF3Ry-gVyKmSVse4s1zmfnyd4_9b3F8&callback=loadMap">
</script>
</html>
