<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Register</title>
</head>
<body>
<form method="post" action="studentregistersubmit.php">
	<table>
		<tr>
			<td>
				<label>Forename</label>
			</td>
			<td>
				<input type="text" name="fn">
			</td>
		</tr>
		<tr>
			<td>
				<label>Surname</label>
			</td>
			<td>
				<input type="text" name="sn">
			</td>
		</tr>
		<tr>
			<td>
				<label>Email</label>
			</td>
			<td>
				<input type="text" name="em">
			</td>
		</tr>
		<tr>
			<td>
				<label>Password</label>
			</td>
			<td>
				<input type="password" name="pw">
			</td>
		</tr>
		<tr>
			<td>
				<label>Course:</label>
			</td>
			<td>
				<?php 
					$conn = mysqli_connect("localhost","root","root","ace_training");
					$sql = ("SELECT * FROM `course` WHERE 1");
					mysqli_query($conn,$sql) or die(mysqli_error($conn));
					$result = mysqli_query($conn,$sql);
					while ($data = mysqli_fetch_array($result)) {
						$name = $data['name'];
						echo "<input type='radio' name='course' value='$name'>";
						echo "<label>$name</label>";
						echo "<br>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit">
			</td>
		</tr>
	</table>
</form>
</body>
</html>