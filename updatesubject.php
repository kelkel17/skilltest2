<?php
	require_once("dbcon.php");
//	$teachers = viewAllSubjectsWithTeachers();
	$teachers = viewAllTeachers();
		 					
	if(isset($_POST['updateSubject'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$detail = $_POST['detail'];
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];
		$date = $_POST['date'];
		$teacher = $_POST['teacher'];

		$data = array($name,$detail,$stime,$etime,$date,$teacher,$id);
		updateSubject($data);
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$subject = getSubject(array($id));
		if(count($subject) > 0){
			foreach ($subject as $row) {
				$id = $row['subject_id'];
				$name =  $row['subject_name'];
				$detail = $row['subject_details'];
				$stime = $row['subject_stime'];
				$etime = $row['subject_etime'];
				$date = $row['subject_date'];
				$teacher = $row['teacher_id'];
		
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Upate Subject</h1></center>
	<br /><br /><br />
	<table>
	<form method="post">
		<tr>
			<td>
				Subject ID:
				<input type="text" name="id" value="<?php echo $id; ?>" required readonly>
			</td>
		</tr>
		<tr>
			<td>
				Subject Name:
				<input type="text" name="name" value="<?php echo $name; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Subject Details:
				<input type="text" name="detail" value="<?php echo $detail; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Subject Schedule:
				<input type="days" name="date" value="<?php echo $date; ?>" required>
				<input type="time" name="stime" value="<?php echo $stime; ?>" required>
				<input type="time" name="etime" value="<?php echo $etime; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Adviser:
				<select name="teacher" value="<?php echo $teacher?>" required>
								<option value="">---Select School---</option>
								<?php
								foreach ($teachers as $row) {
											$id = $row['teacher_id'];
											$fname = $row['teacher_fname'];
											$lname = $row['teacher_lname'];
								?>
								<option value="<?php echo $id; ?>"
									<?php
										if($id == $teacher){
											echo "selected";
										}
									 ?>
									 ><?php echo $fname.' '.$lname; ?></option>
								<?php			
									}		
								?>
				</select>
			</td>
		</tr>

		<tr>
			<td>
				<input type="submit" name="updateSubject" class="buttons" value="Update Subject">
				</form>
				<a href="subjectmanagement.php"><button class="buttons">Cancel</button></a>
			</td>
		</tr>															
	</table>
<?php 
			}
		}
	else {
			echo "Nothing to Show.";
?>
	<a href="subjectmanagement.php"><button class="buttons">Go Back!</button></a>
<?php 
		}
}		
	
?>
</body>
</html>