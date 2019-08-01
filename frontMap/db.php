<?php
// Opens a connection to a MySQL server.
$connection=mysqli_connect ("us-cdbr-iron-east-02.cleardb.net", 'b1ba6b6cee86e7', '6b75b8d6','heroku_28c866c0cec52d8');
if (!$connection) {
    die('Not connected : ' . mysqli_connect_error());
}


// Sets the active MySQL database.
/*$db_selected = mysqli_select_db($connection,'accounts');
if (!$db_selected) {
    die ('Can\'t use db : ' . mysqli_error($connection));
}*/