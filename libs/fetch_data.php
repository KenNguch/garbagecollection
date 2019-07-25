<?php 
function alertcheck(){
	include("db_connect.php");
	$currentuser=getLoggedMemberID();
	if ($currentuser<>"admin") {
	# code...
		$sql="SELECT * FROM membership_userrecords WHERE tableName='customers' AND memberID='$currentuser'";
		$result=mysqli_query($con,$sql);
		$rowcount=mysqli_num_rows($result);
		if ($rowcount==0) {
		# code...
			echo '<div class="alert alert-info">
			<strong>Hello '.$currentuser.'</strong> You have no data in our customers records,kindly submit your data so that you can enjoy our services!!.
			</div>';
		}
	}
}
function countrecords($table){
	include("db_connect.php");
	$currentuser=getLoggedMemberID();
	if ($currentuser=="admin") {
	# code...
		$sql="SELECT * FROM $table ORDER BY id";
		$result=mysqli_query($con,$sql);
		$rowcount=mysqli_num_rows($result);
		echo $rowcount;
	}
	else {
	# code...
		if ($table=="customers") {
		# code...
			$sql="SELECT * FROM membership_userrecords WHERE tableName='$table' AND memberID='$currentuser'";
			$result=mysqli_query($con,$sql);
			$rowcount=mysqli_num_rows($result);
			echo $rowcount;
		}
		elseif ($table=="bookings") {
		# code...
			$sql="SELECT * FROM membership_userrecords WHERE tableName='$table' AND memberID='$currentuser'";
			$result=mysqli_query($con,$sql);
			$rowcount=mysqli_num_rows($result);
			echo $rowcount;
		}
		else{
		# code...
			$sql="SELECT * FROM $table ORDER BY id";
			$result=mysqli_query($con,$sql);
			$rowcount=mysqli_num_rows($result);
			echo $rowcount;
		}
	}

}
function duetoday($table){
	include("db_connect.php");
	$todaydate=date('Y-m-d');
	#select records with current date
	$sql="SELECT id AS dateid FROM availability WHERE date='$todaydate' ORDER BY id";
	$result=mysqli_query($con,$sql);
	foreach ($result as $currdate => $cdate) {
		# code...current date id
		$cdid=$cdate['dateid'];
	}
	$sql="SELECT * FROM $table WHERE date='$cdid'";
	$result=mysqli_query($con,$sql);
	$rowcount=mysqli_num_rows($result);
	if ($rowcount==0) {
		# code...if no bookings due today show alert
		echo '<div class="alert alert-success">
		<strong>No Bookings Due Today</strong>.
		</div>';
	}
	foreach ($result as $allbookings => $booking) {
		#store ids for use in retrieving records
		$customerid=$booking['id_number'];
		$slotid=$booking['slot'];
		$truckid=$booking['truck'];
		$amtid=$booking['amount'];
		$dateid=$booking['date'];
		#code..get customer details
		$sql="SELECT * FROM customers WHERE id='$customerid'";
		$result=mysqli_query($con,$sql);
		foreach ($result as $allcustomers => $cdetails) {
			# code...store customer details
			$fullname=$cdetails['fullname'];
			$phone=$cdetails['phone'];
			$id_number=$cdetails['id_number'];
		}
		#code..get truck details
		$sql="SELECT * FROM trucks WHERE id='$truckid'";
		$result=mysqli_query($con,$sql);
		foreach ($result as $altruckes => $truckdetails) {
			# code...
			$truck=$truckdetails['number'];
		}
		#code..slot details
		$sql="SELECT * FROM slots WHERE id='$slotid'";
		$result=mysqli_query($con,$sql);
		foreach ($result as $allslots => $slotdetails) {
			# code...
			$slot=$slotdetails['name'];
		}
		#code..get availability details
		$sql="SELECT * FROM availability WHERE id='$dateid'";
		$result=mysqli_query($con,$sql);
		foreach ($result as $allavailability => $availabilitydetails) {
			# code...
			$date=$availabilitydetails['date'];
			$time=$availabilitydetails['time'];
		}
		#get amount details
		$sql="SELECT * FROM routes WHERE id='$amtid'";
		$result=mysqli_query($con,$sql);
		foreach ($result as $allamounts => $amountdetails) {
			# code...
			$amount=$amountdetails['amount'];
		}
		# code...display the records
		echo '<tr>
		<td>'.$id_number.'</td>
		<td>'.$fullname.'</td>
		<td>'.$phone.'</td>
		<td>'.$truck.'</td>
		<td>'.$slot.'</td>
		<td>'.$date.'</td>
		<td>'.$time.'</td>
		<td>'.$amount.'</td>
		<td>'.$booking['date_booked'].'</td>
		</tr>';
	}
}


?>