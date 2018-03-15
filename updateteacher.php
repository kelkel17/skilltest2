<?php
	require_once("dbcon.php");
	if(isset($_POST['updateTeacher'])){
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$updateress = $_POST['updateress'];


		$data = array($fname,$mname,$lname,$phone,$updateress,$id);
		updateTeacher($data);
	}

	if(isset($_GET['tid'])){
		$id = $_GET['tid'];
		$teacher = getTeacher(array($id));
		if(count($teacher) > 0){
			foreach ($teacher as $row) {
			
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center><h1>update Teacher</h1></center>
	<br /><br /><br />
	<table>
	<form method="post">
		<tr>
			<td>
				Teacher ID:
				<input type="text" name="id" value="<?php echo $row['teacher_id']; ?>" required readonly>
			</td>
		</tr>
		<tr>
			<td>
				Teacher Fist Name:
				<input type="text" name="fname" value="<?php echo $row['teacher_fname']; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Teacher Middle Name:
				<input type="text" name="mname" value="<?php echo $row['teacher_mname']; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Teacher Last Name:
				<input type="text" name="lname" value="<?php echo $row['teacher_lname']; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Teacher Phone:
				<input type="text" name="phone" value="<?php echo $row['teacher_phone']; ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				Teacher updateress:
				<input type="text" name="updateress" value="<?php echo $row['teacher_address']; ?>" required>
			</td>
	
		<tr>
			<td>
				<input type="submit" name="updateTeacher" class="buttons" value="update Teacher">
				</form>
				<a href="Teachermanagement.php"><button class="buttons">Cancel</button></a>
			</td>
		</tr>															
	</table>
<?php 
			}
		}
	else{
		echo "Nothing to show.";
?>
	<a href="teachermanagement.php"><button class="buttons">Go Back!</button></a>
<?php
	}
}	
 ?>
</body>
</html>