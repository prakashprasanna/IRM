
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "jason";

// Create linkection
global $link;
$link = mysqli_connect($servername, $username, $password, $db);

// Check linkection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "linkected successfully";
?>