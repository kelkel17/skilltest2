<?php 
	require_once("dbcon.php");
	if(isset($_POST['updatestudent']))
	{
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$bdate = $_POST['bdate'];
		$year = $_POST['year'];
		$course = $_POST['course'];

		$data = array($fname,$mname,$lname,$age,$gender,$bdate,$year,$course,$id);
		updateStudent($data);
	}
	if(isset($_GET['sid']))
	{
		$id = $_GET['sid'];
		$student = getStudent(array($id));
		if(count($student) > 0){

			foreach ($student as $row) {
					$id = $row['student_id'];
					$fname = $row['student_fname'];
					$mname = $row['student_mname'];
					$lname = $row['student_lname'];
					$age = $row['student_age'];
					$gender = $row['student_gender'];
					$bdate = $row['student_bdate'];
					$course = $row['student_course'];
					$year = $row['student_year'];
			

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>Update Student</h1></center>
	<br /><br /><br />
	<table>
	<form method="post">
		<tr>
			<td>
				Student ID:
				<input type="text" name="id" value="<?php echo $id; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Student Fist Name:
				<input type="text" name="fname" value="<?php echo $fname; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Student Middle Name:
				<input type="text" name="mname" value="<?php echo $mname; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Student Last Name:
				<input type="text" name="lname" value="<?php echo $lname; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Student Age:
				<input type="text" name="age" value="<?php echo $age; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Student Gender:
				<input type="radio" name="gender" value="Male" <?php if($gender == "Male"){?> checked="true" <?php }?> required>Male
				<input type="radio" name="gender" value="Female" <?php if($gender == "Female"){ echo "checked";}?> required>Female
			</td>
		</tr>
			<td>
				Student Birthdate:
				<input type="date" name="bdate" value="<?php echo $bdate; ?>" required>
			</td>
		</tr>		
		<tr>
			<td>
				Student Course & Year:
				<input type="text" name="course" value="<?php echo $course; ?>"  required>
				<select name="year" required>
					<option value="">--Year Level--</option>
				<?php 
					for($i = 1; $i < 6; $i++){
				?>
					<option  value="<?php echo $i; ?>"
				<?php		
					if($year == $i){
						echo "selected";
					}
				?>
				><?php echo $i?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="updatestudent" class="buttons" value="Update Student">
		</form>
				<a href="studentmanagement.php"><button class="buttons">Cancel</button></a>
			</td>
		</tr>															
	</table>
<?php 		
			}
		}	
	}
	else{
			echo "Nothing to Show.";
?>
<a href="studentmanagement.php"><button class="buttons">Go Back</button>
<?php
	}
 ?>
</body>
</html>