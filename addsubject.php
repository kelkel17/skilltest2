<?php
	require_once("dbcon.php");
	$teachers = viewAllTeachers();
	if(isset($_POST['addSubject'])){
		$name = $_POST['name'];
		$detail = $_POST['detail'];
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];
		$date = $_POST['date'];
		$stat = "Open";
		$teacher = $_POST['teacher'];

		$data = array($name,$detail,$stime,$etime,$date,$stat,$teacher);
		addSubject($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Add Subject</h1></center>
	<br /><br /><br />
	<table>
	<form method="post">
		<tr>
			<td>
				Subject Name:
				<input type="text" name="name" required>
			</td>
		</tr>
		<tr>
			<td>
				Subject Details:
				<input type="text" name="detail">
			</td>
		</tr>
		<tr>
			<td>
				Subject Schedule:
				<input type="days" name="date" required>
				<input type="time" name="stime" required>
				<input type="time" name="etime" required>
			</td>
		</tr>
		<tr>
			<td>
				Adviser:
				<select name="teacher">
					<option>--Select an Adviser--</option>
		<?php
				if(count($teachers) > 0){
					foreach ($teachers as $row) {
						$id = $row['teacher_id'];
						$fname = $row['teacher_fname'];
						$lname = $row['teacher_lname'];
		 ?>
					<option value="<?php echo $id; ?>"><?php echo $fname.' '.$lname; ?></option>
		<?php 
				}
			}
		?>			
				</select>
			</td>
		</tr>

		<tr>
			<td>
				<input type="submit" name="addSubject" class="buttons" value="Add Subject">
				</form>
				<a href="subjectmanagement.php"><button class="buttons">Cancel</button></a>
			</td>
		</tr>															
	</table>

</body>
</html>