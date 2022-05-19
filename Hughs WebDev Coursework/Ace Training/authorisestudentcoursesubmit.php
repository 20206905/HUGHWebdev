<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Authorise student course submit</title>
	<style>
		table, th, td {
			border:1px solid black;
		}
	</style>
</head>
<body>
	<form method="post" action="authorisedstudent.php">
		<table>
			<tr>
				<td>
					<label>Forename</label>
				</td>
				<td>
					<label>Surname</label>
				</td>
				<td>
					<label>Authorise</label>
				</td>
			</tr>
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
									$course = $_POST['course'];
									$sql2 = ("SELECT * FROM `course` WHERE 1");
									$result = mysqli_query($conn,$sql2);
									while ($data = mysqli_fetch_array($result)) {
										$cid = $data['id'];
										$cname = $data['name'];
										if ($course == $cname) {
											$sql3 = ("SELECT * FROM `tutorteaching` WHERE 1");
											$result = mysqli_query($conn,$sql3);
											while ($data = mysqli_fetch_array($result)) {
												$ttcid = $data['courseid'];
												if ($cid == $ttcid) {
													$tttid = $data['tutorid'];
													if ($id == $tttid) {
														$sql4 = ("SELECT * FROM `studenttaking` WHERE 1");
														$result = mysqli_query($conn,$sql4);
														while ($data = mysqli_fetch_array($result)) {
															$stcid = $data['courseid'];
															if ($cid == $stcid) {
																$stsid = $data['studentid'];
																$sql5 = ("SELECT * FROM `user` WHERE 1");
																$result = mysqli_query($conn,$sql5);
																while ($data = mysqli_fetch_array($result)) {
																	$uid = $data['id'];
																	if ($stsid == $uid) {
																		$auth = $data['authorised'];
																		if ($auth = 'no') {
																			$ufn = $data['forename'];
																			$usn = $data['surname'];
																			echo "
																			<tr>
																				<td>
																					$ufn
																				</td>
																				<td>
																					$usn
																				</td>
																				<td>
																					<input type='radio' name='student' value='$uid'>
																				</td>
																			</tr>
																			";
																		}

																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
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