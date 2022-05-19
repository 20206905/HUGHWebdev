<?php
$fn = $_POST['fn'];
$sn = $_POST['sn'];
$em = $_POST['em'];
$pw = $_POST['pw'];
$conn = mysqli_connect("localhost","root","root","ace_training");
$sql = ("INSERT INTO `user`(`forename`, `surname`, `email`, `password`, `type`, `authorised`) VALUES ('$fn','$sn','$em','$pw','admin','no')");
mysqli_query($conn,$sql) or die(mysql_error($conn));
$sql2 = ("SELECT `id` FROM `user` WHERE email = '$em'");
$result = mysqli_query($conn,$sql2);
while ($data = mysqli_fetch_array($result)) {
	$id = $data['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Register Submit</title>
</head>
<body>
	<a href="home.html">Home</a>
	<br>
	<p>This is your ID: <?php echo "$id"; ?>, make sure you remember it as you'll need it to log in, however, before you can log in you'll need to have been authorised by Hugh Culling, the owner of the website.</p>
</body>
</html>