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
$name = $eml = $sub = $msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['msgname'];
	$eml = $_POST['msgmail'];
	$sub = $_POST['msgsubject'];
	$msg = $_POST['msg'];
	$sql = "INSERT INTO message (name, email, subject, message)
	VALUES ('$name', '$eml', '$sub', '$msg')";

	if ($conn->query($sql) === TRUE) {
		header('Location: http://localhost/practice/index.php?message=true');
	} else {
	    echo "Error: " . "<br>" . $conn->error;
	}
}

$conn->close();
?>