<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authorise student submit</title>
</head>
<body>
	<?php 
		$id = $_POST['id'];
		$pw = $_POST['pw'];
		$conn = mysqli_connect("localhost","root","root","ace_training");
		$sql = ("SELECT * FROM `user` WHERE 1");
		$result = mysqli_query($conn,$sql);
		while ($data = mysqli_fetch_array($result)) {
			$dbid = $data['id'];
			if ($id == $dbid) {
				$dbpw = $data['password'];
				if ($pw == $dbpw) {
					$type = $data['type'];
					if ($type == 'tutor') {
						$auth = $data['authorised'];
						if ($auth == 'yes') {
							echo "
							<form method='post' action='authorisestudentcoursesubmit.php'>
								<table>
									<tr>
										<td>
											<label>ID</label>
										</td>
										<td>
											<input type='text' name='id'>
										</td>
									</tr>
									<tr>
										<td>
											<label>Password</label>
										</td>
										<td>
											<input type='password' name='pw'>
										</td>
									</tr>
									<tr>
										<td>
											<label>Course</label>
										</td>
										<td>";
										$sql2 = ("SELECT course.name, user.id
												  FROM tutorteaching
												  INNER JOIN user ON tutorteaching.tutorid = user.id
												  INNER JOIN course ON tutorteaching.courseid = course.id;");
										$result = mysqli_query($conn,$sql2);
										while ($data = mysqli_fetch_array($result)) {
											$name = $data['name'];
											$cid = $data['id'];
											if ($id == $cid) {
											echo "<input type='radio' name='course' value='$name'";
											echo "<label>$name</label>";
											echo "<br>";
											}
										}
										echo "</td>
									</tr>
									<tr>
										<td>
											<input type='submit'>
										</td>
									</tr>
								</table>
							</form>
							";

						}
					}
				}
			}
		}
	?>
</body>
</html>