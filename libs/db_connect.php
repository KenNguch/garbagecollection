<?php 
$con=mysqli_connect('us-cdbr-iron-east-02.cleardb.net','b1ba6b6cee86e7','6b75b8d6','heroku_28c866c0cec52d8');
if (mysqli_connect_errno()) {
	# code...
	echo "Could not connect to MYSQL database".mysqli_connect_error();
}
 ?>