<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "megatroll";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$password = $email = $id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["inputEmail2"];
	$password = $_POST["inputPassword2"];
	$query = "SELECT * FROM users WHERE email='$email' and  password='$password'";
	$fnamequery = "SELECT firstname FROM users WHERE email='$email' and  password='$password'";
	$fname = mysqli_query($conn, $fnamequery);
	$res = mysqli_query($conn, $query);

	if (!$res) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message = 'Whole query: ' . $query;
		die($message);
	}
	if (!mysqli_num_rows($res)) {
		echo "Invalid details";
	}else{
		while ($row = mysqli_fetch_array($fname, MYSQL_ASSOC)) {
			session_start();
			$_SESSION["fname"] = $row['firstname'];
			$_SESSION["lname"] = $row['firstname'];
			$id=$row['firstname'];
		}
		header('Location: http://localhost/practice/index.php?id='.$id.'');
		
	}
}

$conn->close();
?>

