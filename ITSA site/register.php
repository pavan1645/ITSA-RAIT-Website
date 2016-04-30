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

$fname = $_POST['inputFName'];
$lname = $_POST['inputLName'];
$gen = $_POST['optionsRadios'];
$eml = $_POST['email'];
$pwd = $_POST['password'];

$sql = "INSERT INTO Users (firstname, lastname, gender, email, password)
VALUES ('$fname', '$lname', '$gen', '$eml', '$pwd')";

if ($conn->query($sql) === TRUE) {
	header('Location: http://localhost/practice/index.php?register=true');
} else {
    echo "Error: " . "<br>" . $conn->error;
}

$conn->close();
?>