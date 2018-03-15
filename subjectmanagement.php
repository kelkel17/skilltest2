<?php 
	require_once("dbcon.php");
	$subjects = viewAllSubjects();

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		deleteSubject(array($id));
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <center><h1>Subject Management</h1></center>
 <br /><br /><br />
 <a href="addsubject.php"><button class="myButton">Add Subject</button></a>
 <a href="index.php"><button class="myButton">Go Back!</button></a>
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
 				<a href="subjectdetail.php?id=<?php echo $row['subject_id'];?>"><button class="button1">Details</button></a>
 				<a href="updatesubject.php?id=<?php echo $row['subject_id'];?>"><button class="button1">Update</button></a>
 				<a href="subjectmanagement.php?id=<?php echo $row['subject_id'];?>"><button class="button3">Delete</button></a>
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
 		</tr>
 	</tbody>
 	<?php 	
 		}
 	 ?>
 </table>
</body>
</html>