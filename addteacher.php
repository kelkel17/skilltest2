<?php
	require_once("dbcon.php");
	if(isset($_POST['addTeacher'])){
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];


		$data = array($fname,$mname,$lname,$phone,$address);
		addTeacher($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Add Teacher</h1></center>
	<br /><br /><br />
	<table>
	<form method="post">
		<tr>
			<td>
				Teacher Fist Name:
				<input type="text" name="fname" required>
			</td>
		</tr>
		<tr>
			<td>
				Teacher Middle Name:
				<input type="text" name="mname">
			</td>
		</tr>
		<tr>
			<td>
				Teacher Last Name:
				<input type="text" name="lname" required>
			</td>
		</tr>
		<tr>
			<td>
				Teacher Phone:
				<input type="text" name="phone" required>
			</td>
		</tr>
		<tr>
			<td>
				Teacher Address:
				<input type="text" name="address" required>
			</td>
	
		<tr>
			<td>
				<input type="submit" name="addTeacher" class="buttons" value="Add Teacher">
				</form>
				<a href="Teachermanagement.php"><button class="buttons">Cancel</button></a>
			</td>
		</tr>															
	</table>

</body>
</html>