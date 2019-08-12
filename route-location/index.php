<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	<nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navigation">
                <div class="container">
                    
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                            <a href="http://garbagecollectionsystem.herokuapp.com">
                                <h3 align="left" ><span>GARBAGE </span>KOLLECTORZ</h3>
                            </a>

                    

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a href="http://garbagecollectionsystem.herokuapp.com" class="active">Dashboard</a></li>
                                <li role="presentation"><a href="http://garbagecollectionsystem.herokuapp.com/customers_view.php">Customers</a></li>
                                <li role="presentation"><a href="http://garbagecollectionsystem.herokuapp.com/bookings_view.php">Bookings</a></li>
                                <li role="presentation"><a href="http://garbagecollectionsystem.herokuapp.com/trucks_view.php">Truck</a></li>
                                <li role="presentation"><a href="http://garbagecollectionsystem.herokuapp.com/slots_view.php">Slots</a></li>
								<li role="presentation"><a href="http://garbagecollectionsystem.herokuapp.com/availability_view.php">Availability</a></li>
								<li role="presentation"><a href="http://garbagecollectionsystem.herokuapp.com/routes_view.php">Routes</a></li>



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div id="map" style="height: 400px; width: 100%;"></div>
		</div>
	</div>
</div>
<script>
function initMap() {
   	var location = {lat:-1.1136, lng:36.6420517};
   	var map = new google.maps.Map(document.getElementById('map'), {
      	zoom: 15,
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
