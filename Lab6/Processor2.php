 <?php
session_start();
?>

 <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";

	$name=$_SESSION["name"];
	$email=$_SESSION["email"];
	$gender=$_SESSION["gender"];
	$pass=$_SESSION["pass"];
	$picture=$_SESSION["picture"];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO MyUsers (Name, Email, Gender, Password, Images)
	VALUES ('$name', '$email', '$gender', '$pass', '$picture')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
