<?php 
	$id = $_POST['student'];
	$conn = mysqli_connect("localhost","root","root","ace_training");
	$sql = ("UPDATE `user` SET `authorised`='yes' WHERE id = '$id'");
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authorised student</title>
</head>
<body>
	<a href="home.html">Home</a>
	<br>
	<p>Student with id: <?php echo "$id"; ?> has been authorised</p>
</body>
</html>