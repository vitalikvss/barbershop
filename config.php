<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barbershop";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>