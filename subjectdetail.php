<?php 
	require_once("dbcon.php");
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$subjects = getSubject(array($id));

	
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <center><h1>Subject Management</h1></center>
 <a href="addsubject.php"><button class="myButton">Add Subject</button></a>
 <a href="subjectmanagement.php"><button class="myButton">Go Back!</button></a>
 <br /><br /><br />
 <table>
 	<thead>
 		<tr>
 			<th>Subject ID</th>
 			<th>Subject Name</th>
 			<th>Subject Description</th>
 			<th>Subject Schedule</th>
 			<th>Teacher</th>
 			<th>Actions</th>
 		</tr>
 	</thead>	
 	<tbody>
	
 	<?php

 			if(count($subjects) > 0){
 				foreach ($subjects as $row) {
 	?>
 		<tr>
 			<td><?php echo $row['subject_id'];?></td>
 			<td><?php echo $row['subject_name'];?></td>
 			<td><?php echo $row['subject_details'];?></td>
 			<td><?php echo $row['subject_date'].' '.date('h:m A', strtotime($row['subject_stime'])).' - '.date('h:m A', strtotime($row['subject_etime']));?></td>
 			<td>
 				<?php
 					$teachers = viewAllTeachers();
 					foreach ($teachers as $rows) {
 						if($row['teacher_id'] == $rows['teacher_id'])
 					 	echo $rows['teacher_fname'].' '.$rows['teacher_lname'];
 					 } 
 					
 				?></td>
 			<td>
 				<a href="subjectdetail.php?bid=<?php echo $row['subject_id'];?>"><button class="button1">Details</button></a>
 				<a href="updatesubject.php?id=<?php echo $row['subject_id'];?>"><button class="button1">Update</button></a>
 				<a href="subjectmanagement.php?id=<?php echo $row['subject_id'];?>"><button class="button3">Delete</button></a>
 			</td>
 		</tr>	
 	<?php 
 				}
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
 		</tr>
 	</tbody>
 	<?php 	
 		}
 	 ?>
 </table>
 <center><h1>Student Enrolled</h1></center>
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
 		if(isset($_GET['id']))
 		{
 			$id = $_GET['id'];
 			$students = viewAllSubjectStudents(array($id));
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