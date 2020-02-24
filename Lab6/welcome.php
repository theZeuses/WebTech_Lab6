<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
	<h2>Profile:</h2><br>
	<b>Name:</b> <?php echo $_SESSION["nam"]; ?><br>
	<b>Email:</b> <?php echo $_SESSION["em"]; ?><br>
	<b>Gender:</b> <?php echo $_SESSION["gen"]; ?><br>
	<b>Picture:</h3><b> <?php echo "<img src=".$_SESSION["pic"]." width=300 height=300>"; ?>

</body>
</html>