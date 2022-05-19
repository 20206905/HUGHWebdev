<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Created course</title>
</head>
<body>
	<a href="home.html">Home</a>
	<br>
	<?php
		$id = $_POST['id'];
		$pw = $_POST['pw'];
		$cn = $_POST['cn'];
		$conn = mysqli_connect("localhost","root","root","ace_training");
		$sql = ("SELECT * FROM `user` WHERE 1");
		mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$result = mysqli_query($conn,$sql);
		while ($data = mysqli_fetch_array($result)) {
			$dbid = $data['id'];
			$dbpw = $data['password'];
			$type = $data['type'];
			$auth = $data['authorised'];
			if ($id == $dbid) {
				if ($pw == $dbpw) {
					if ($type == 'tutor') {
						if ($auth == 'yes') {
							$sql2 = ("INSERT INTO `course`(`name`) VALUES ('$cn')");
							mysqli_query($conn,$sql2) or die(mysqli_error($conn));
							$sql3 = ("SELECT `id` FROM `course` WHERE name = '$cn'");
							mysqli_query($conn,$sql3) or die(mysqli_error($conn));	
							$result = mysqli_query($conn,$sql3);
							while ($data = mysqli_fetch_array($result)) {
								$cid = $data['id'];
							}					
							$sql4 = ("INSERT INTO `tutorteaching`(`tutorid`, `courseid`) VALUES ('$id','$cid')");
							mysqli_query($conn,$sql4) or die(mysqli_error($conn));
							echo "The course: $cn has been created";							
						}
					}
				}
			}
		}
	?>
</body>
</html>