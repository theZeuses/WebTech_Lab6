<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

	Name: <?php echo $_SESSION["nam"]; ?><br>
	Email: <?php echo $_SESSION["nam"]; ?><br>
	Gender: <?php echo $_SESSION["nam"]; ?><br>
	Picture:<br> <?php echo "<img src=".$_SESSION["pic"].">"; ?>

</body>
</html>