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
	$name="";$email="";$gender="Male";$pass="";
  $nameErr=$emailErr=$passErr="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $val=FALSE;
      }
       else {
          $name = test_input($_POST["name"]);
          $val=TRUE;
      }

      if (empty($_POST["pass"])) {
        $passErr = "Password is required";
        $val=FALSE;
      }
       else {
          $pass= test_input($_POST["pass"]);
          if($val) $val=TRUE;
          else $val=FALSE;
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
      $gender=$_POST["gender"];
      
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
    Name: <br>
    <input type="text" name="name" value="<?php echo $name; ?>" > <span class="error">* <?php echo $nameErr;?></span>
    <br>
    Email: <br>
    <input type="EMAIL" name="email" value="<?php echo $email; ?>"> <span class="error">* <?php echo $emailErr;?></span>
    <br>
    Gender:<br>
    <input type="radio" name=gender value="Male" <?php if($gender=="Male") echo 'checked'; ?>>Male
    <input type="radio" name=gender value="Female" <?php if($gender=="Female") echo 'checked'; ?>>Female 
    <input type="radio" name=gender value="Other" <?php if($gender=="Other") echo 'checked'; ?>>Other
    <br>
    Password: <br>
    <input type="password" name="pass" value="<?php echo $pass; ?>" > <span class="error">* <?php echo $passErr;?></span>
    <br><br>
  <input type="submit" value="Submit">
</form>

<?php
if($val){
  $_SESSION["name"] = $name;
  $_SESSION["email"] = $email;
  $_SESSION["gender"] = $gender;
  $_SESSION["pass"] = $pass;
  header('location:Processor.php');
 exit();
}
?>

</body>
</html>