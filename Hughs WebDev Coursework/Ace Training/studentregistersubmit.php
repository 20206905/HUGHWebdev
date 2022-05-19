<?php
	$fn = $_POST['fn'];
	$sn = $_POST['sn'];
	$em = $_POST['em'];
	$pw = $_POST['pw'];
	$conn = mysqli_connect("localhost","root","root","ace_training");
	$sql = ("INSERT INTO `user`(`forename`, `surname`, `email`, `password`, `type`, `authorised`) VALUES ('$fn','$sn','$em','$pw','student','no')");
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$sql2 = ("SELECT `id` FROM `user` WHERE email = '$em'");
	$result = mysqli_query($conn,$sql2);
	while ($data = mysqli_fetch_array($result)) {
		$id = $data['id'];
	}
	$course = $_POST['course'];
	$sql3 = ("SELECT * FROM `course` WHERE name = '$course'");
	$result = mysqli_query($conn,$sql3);
	while ($data = mysqli_fetch_array($result)) {
		$cid = $data['id'];
	}
	$sql4 = ("INSERT INTO `studenttaking`(`studentid`, `courseid`) VALUES ('$id','$cid')");
	mysqli_query($conn,$sql4) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Register Submit</title>
</head>
<body>
	<a href="home.html">Home</a>
	<br>
	<p>This is your ID: <?php echo "$id"; ?>, make sure you remember it as you'll need it to log in, however, before you can log in you'll need to have been authorised by a Tutor.</p>
</body>
</html>