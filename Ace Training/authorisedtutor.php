<?php
	$id = $_POST['authorise'];
	$conn = mysqli_connect("localhost","root","root","ace_training");
	$sql = ("UPDATE `user` SET `authorised`='yes' WHERE id ='$id'");
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authorised tutor</title>
</head>
<body>
	<a href="home.html">Home</a>
	<p>The tutor with id number: <?php echo "$id"; ?> has been authorised, they'll now be able to create courses, view the courses that they have created and authorise students onto their courses.</p>
</body>
</html>