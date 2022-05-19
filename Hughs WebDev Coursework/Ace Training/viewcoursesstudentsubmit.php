<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Courses Student Submit</title>
</head>
<body>
	<a href="home.html">Home</a>
	<br>
		<?php 
			$id = $_POST['id'];
			$pw = $_POST['pw'];
			$conn = mysqli_connect("localhost","root","root","ace_training");
			$sql = ("SELECT * FROM `user` WHERE 1");
			$result = mysqli_query($conn,$sql);
			while ($data = mysqli_fetch_array($result)) {
				$dbid = $data['id'];
				$dbpw = $data['password'];
				if ($id == $dbid) {
					if ($pw == $dbpw) {
						$sql2 = ("SELECT course.name, user.id
								  FROM studenttaking
								  INNER JOIN user ON studenttaking.studentid = user.id
								  INNER JOIN course ON studenttaking.courseid = course.id;");
						$result = mysqli_query($conn,$sql2);
						while ($data = mysqli_fetch_array($result)) {
							$cname = $data['name'];
							$stsid = $data['id'];
							if ($stsid == $id) {
								echo "$cname";
							}
						}
					}
				}
			}
		?>
</body>
</html>