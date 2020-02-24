<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
  $val=FALSE;
	$email="";$pass="";
  $emailErr=$passErr="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["pass"])) {
        $passErr = "Password is required";
        $val=FALSE;
      }
       else {
          $pass= test_input($_POST["pass"]);
          $val=TRUE;         
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $val=FALSE;
      } else {
          $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $val=FALSE;
          }
      }
      
    }

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Enter your Information.</h2>
<p><span class="error">* required field</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Email: <br>
    <input type="EMAIL" name="email" value="<?php echo $email; ?>"> <span class="error">* <?php echo $emailErr;?></span>
    <br>
    Password: <br>
    <input type="password" name="pass" value="<?php echo $pass; ?>" > <span class="error">* <?php echo $passErr;?></span>
    <br><br>
  <input type="submit" value="Submit">
</form>

<?php
if($val){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM MyUsers WHERE Email='$email' and Password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION["nam"] = $row["Name"];
            $_SESSION["em"] = $row["Email"];
            $_SESSION["gen"] = $row["Gender"];
            $_SESSION["pas"] = $row["Password"];
            $_SESSION["pic"] = $row["Images"];
        }
        header('location:welcome.php');
        exit();
    } else {
        echo "\n\nInvalid Credentials.";
    }
    $conn->close();    
}
?>

</body>
</html>