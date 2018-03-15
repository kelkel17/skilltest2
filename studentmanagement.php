<?php
	require_once("dbcon.php");
	$students = viewAllStudents();
	if(isset($_GET['sid']))
	{
		$id = $_GET['sid'];
		deleteStudent(array($id));
	}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <center><h1>Student Management</h1></center>
 <br /><br /><br />
 <a href="addstudent.php"><button class="myButton">Add Student</button></a>
 <a href="index.php"><button class="myButton">Go Back!</button></a>
 <br /><br /><br />
 <table>
 	<thead>
 		<tr>
 			<th>Student ID</th>
 			<th>Student Name</th>
 			<th>Student Age</th>
 			<th>Student Gender</th>
 			<th>Student Birthdate</th>
 			<th>Student Year & Course</th>
 			<th>Actions</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php
 			if(count($students > 0)){
			foreach ($students as $row) {

 		?>
 		<tr>
 			<td><?php echo $row['student_id'];?></td>
 			<td><?php echo $row['student_fname'];?> <?php echo $row['student_mname'];?> <?php echo $row['student_lname'];?></td>
 			<td><?php echo $row['student_age'];?></td>
 			<td><?php echo $row['student_gender'];?></td>
 			<td><?php echo date('M d, Y', strtotime($row['student_bdate']));?></td>
 			<td><?php echo $row['student_course'];?> <?php echo $row['student_year'];?></td>
 			<td>
 			<a href="studentdetail.php?sid=<?php echo $row['student_id'];?>"><button class="button1">Details</button></a>
 			<a href="updatestudent.php?sid=<?php echo $row['student_id'];?>"><button class="button1">Update</button></a>
 			<a href="studentmanagement.php?sid=<?php echo $row['student_id'];?>"><button class="button3">Delete</button></a>
 			</td>
 		</tr>
<?php 
		}
	}
	else{
?>		
		<tr>
 			<td>No Entry</td>
 			<td>No Entry</td>
 			<td>No Entry</td>
 			<td>No Entry</td>
 			<td>No Entry</td>
 			<td>No Entry</td>
 			<td>No Entry</td>
 		</tr>
<?php } ?>
 	</tbody>
 </table>
</body>
</html>