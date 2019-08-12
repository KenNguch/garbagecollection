<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="text-center page-header">Google Map Location</h3>
			<div id="map" style="height: 400px; width: 100%;"></div>
		</div>
	</div>
</div>
<script>
function initMap() {
   	var location = {lat:-1.1136, lng:36.6420517};
   	var map = new google.maps.Map(document.getElementById('map'), {
      	zoom: 12,
      	center: location
    });
    var marker = new google.maps.Marker({
      	position: location,
      	map: map
    });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1bF3Ry-gVyKmSVse4s1zmfnyd4_9b3F8&callback=initMap"></script>
</body>
</html>
