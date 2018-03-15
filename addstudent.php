<?php
	require_once("dbcon.php");
	if(isset($_POST['addstudent'])){
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$bdate = $_POST['bdate'];
		$year = $_POST['year'];
		$course = $_POST['course'];

		$data = array($fname,$mname,$lname,$age,$gender,$bdate,$year,$course);
		addStudent($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Add Student</h1></center>
	<br /><br /><br />
	<table>
	<form method="post">
		<tr>
			<td>
				Student Fist Name:
				<input type="text" name="fname" required>
			</td>
		</tr>
		<tr>
			<td>
				Student Middle Name:
				<input type="text" name="mname">
			</td>
		</tr>
		<tr>
			<td>
				Student Last Name:
				<input type="text" name="lname" required>
			</td>
		</tr>
		<tr>
			<td>
				Student Age:
				<input type="text" name="age" required>
			</td>
		</tr>
		<tr>
			<td>
				Student Gender:
				<input type="radio" name="gender" value="Male" required>Male
				<input type="radio" name="gender" value="Female" required>Female
			</td>
		</tr>
			<td>
				Student Birthdate:
				<input type="date" name="bdate" required>
			</td>
		</tr>		
		<tr>
			<td>
				Student Course & Year:
				<input type="text" name="course"  required>
				<select name="year" required>
					<option value="">--Year Level--</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="addstudent" class="buttons" value="Add Student">
				</form>
				<a href="studentmanagement.php"><button class="buttons">Cancel</button></a>
			</td>
		</tr>															
	</table>

</body>
</html>