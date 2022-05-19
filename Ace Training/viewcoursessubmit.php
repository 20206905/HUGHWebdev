<?php
	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$conn = mysqli_connect('localhost','root','root','ace_training');
	$sql = ("SELECT * FROM `user` WHERE 1");
	mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$result = mysqli_query($conn,$sql);
	while ($data = mysqli_fetch_array($result)) {
		$dbid = $data['id'];
		$dbpw = $data['password'];
		$type = $data['type'];
		$auth = $data['authorised'];
		if ($dbid == $id) {
			if ($dbpw == $pw) {
				if ($type == 'tutor') {
					if ($auth == 'yes') {
						echo "
						<!DOCTYPE html>
						<html>
						<head>
							<meta charset='utf-8'>
							<meta name='viewport' content='width=device-width, initial-scale=1'>
							<title>View Courses Submit</title>
						</head>
						<body>
							<a href='home.html'>Home</a>
							<br>";
								$sql2 = ("SELECT course.name, user.id
										  FROM tutorteaching
										  INNER JOIN course ON tutorteaching.courseid = course.id 
										  INNER JOIN user ON tutorteaching.tutorid = user.id;");
								mysqli_query($conn,$sql2) or die(mysqli_error($conn));
								$result = mysqli_query($conn,$sql2);
								while ($data = mysqli_fetch_array($result)) {
									$name = $data['name'];
									$ijid = $data['id'];
									if ($ijid == $id) {
										echo "<p>$name</p>";
									}
								}
							echo "
						</body>
						</html>";
					}
				}
			}
		}
	}
?>