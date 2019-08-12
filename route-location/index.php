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
<button onclick="history.go(-1);">Back </button>
	<div class="container">
		<?php 
			require 'education.php';
			$edu = new education;
			$coll = $edu->getlocationsBlankLatLng();
			$coll = json_encode($coll, true);
			echo '<div id="data">' . $coll . '</div>';
			$allData = $edu->getAlllocations();
			$allData = json_encode($allData, true);
			echo '<div id="allData">' . $allData . '</div>';			
		 ?>
		<div id="map"></div>
	</div>
</body>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1bF3Ry-gVyKmSVse4s1zmfnyd4_9b3F8&callback=loadMap">
</script>
</html>

</html>

