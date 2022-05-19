<?php
	$id = $_POST['id'];
	$pw = $_POST['pw'];
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
				if ($type == 'admin') {
					if ($auth == 'yes') {
						echo "
						<!DOCTYPE html>
						<html>
						<head>
							<meta charset='utf-8'>
							<meta name='viewport' content='width=device-width, initial-scale=1'>
							<title>Log In Submit Admin</title>
						</head>
						<body>
							<a href='authorisetutors.php'>Authorise Tutors</a>
						</body>
						</html>";
					}
					else {
						echo "You have not yet been authorised by Hugh Culling, the owner of the website";
					}
				}
				elseif ($type == 'tutor') {
					if ($auth == 'yes') {
						echo "
						<!DOCTYPE html>
						<html>
						<head>
							<meta charset='utf-8'>
							<meta name='viewport' content='width=device-width, initial-scale=1'>
							<title>Log In Submit Tutor</title>
						</head>
						<body>
							<a href='createcourse.html'>Create a Course</a>
							<br/>
							<a href='viewcourses.html'>View courses</a>
							<br/>
							<a href='authorisestudents.php'>Authorise students</a>
						</body>
						</html>";
					}
					else {
						echo "<a href='home.html'>Home</a>";
						echo "<br>";
						echo "You have not yet been authorised by an Admin";
					}					
				}
				elseif ($type == 'student') {
					if ($auth == 'yes') {
						echo "
						<!DOCTYPE html>
						<html>
						<head>
							<meta charset='utf-8'>
							<meta name='viewport' content='width=device-width, initial-scale=1'>
							<title>Log In Submit Student</title>
						</head>
						<body>
							<a href='viewcoursesstudent.html'>View courses</a>
						</body>
						</html>";
					}
					else {
						echo "<a href='home.html'>Home</a>";
						echo "<br>";
						echo "You have not yet been authorised by a Tutor";
					}
				}
			}
		}
	}
?>