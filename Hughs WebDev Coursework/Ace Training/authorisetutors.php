<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authorise Tutors</title>
	<style>
		table, th, td {
			border:1px solid black;
		}
	</style>
</head>
<body>
	<form method="post" action="authorisedtutor.php">
		<table>
			<tr>
				<td>
					Forename
				</td>
				<td>
					Surname
				</td>
				<td>
					Authorise
				</td>
			</tr>
			<?php
				$conn = mysqli_connect("localhost","root","root","ace_training");
				$sql = ("SELECT * FROM `user` WHERE type = 'tutor'");
				mysqli_query($conn,$sql) or die(mysqli_error($conn));
				$result = mysqli_query($conn,$sql);
				while ($data = mysqli_fetch_array($result)) {
					$id = $data['id'];
					$fn = $data['forename'];
					$sn = $data['surname'];
					$auth = $data['authorised'];
					if ($auth == 'no') {
						echo "<tr>
					 	  	<td>
					 	  		$fn
					 	  	</td>
					 	  	<td>
					 	  		$sn
					 	  	</td>
					 	  	<td>
					 	  		<input type='radio' name='authorise' value='$id'>
					 	  	</td>
					 	  </tr>";					
					}
				}
			?>
			<tr>
				<td>
					<input type="submit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>