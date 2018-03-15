<?php
	require_once("dbcon.php");
	
	if(isset($_GET['tid'])){
		$id = $_GET['tid'];
		$teachers = getTeacher(array($id));

	
		
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <center><h1>Teacher Details</h1></center>
 <a href="addteacher.php"><button class="myButton">Add Teacher</button></a>
 <a href="teachermanagement.php"><button class="myButton">Go Back!</button></a>
 <br /><br /><br />
 <table>
 	<thead>
 		<tr>
 			<th>Teacher ID</th>
 			<th>Teacher Name</th>
 			<th>Teacher Phone</th>
 			<th>Teacher Address</th>
 			<th>Actions</th>
 		</tr>
 	</thead>	
 	<tbody>
 		<?php 
	 		if(count($teachers) > 0){
			foreach ($teachers as $row) {
		?>
 		<tr>
 			<td><?php echo $row['teacher_id'];?></td>
 			<td><?php echo $row['teacher_fname'].' '.$row['teacher_mname'].' '.$row['teacher_fname'];?></td>
 			<td><?php echo $row['teacher_phone'];?></td>
 			<td><?php echo $row['teacher_address'];?></td>
 			
 			<td>
 				<a href="teacherdetail.php?tid=<?php echo $row['teacher_id']; ?>"><button class="button1">Details</button></a>
 				<a href="updateteacher.php?tid=<?php echo $row['teacher_id']; ?>"><button class="button1">Update</button></a>
 				<a href="teachermanagement.php?tid=<?php echo $row['teacher_id']; ?>"><button class="button3">Delete</button></a>
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
 		</tr>
 	<?php 
 		}
 	?>	
 	</tbody>
 </table>

 <center><h1>Subject Assigned</h1></center>
 <table>
 	<thead>
 		<tr>
 			<th>Subject ID</th>
 			<th>Subject Name</th>
 			<th>Subject Description</th>
 			<th>Subject Schedule</th>
 			<th>Status</th>
 			<th>Actions</th>
 		</tr>
 	</thead>	
 	<tbody>
	
 	<?php
 			$subjects = viewAllSubjects();
 			if(isset($_GET['tid']))
 			{
 				$id = $_GET['tid'];
 			}
				$teacher = getTeacher(array($id));
				foreach ($teacher as $rows) {
					
				
 			if(count($subjects) > 0){
 				foreach ($subjects as $row) {
 					if($row['teacher_id'] == $rows['teacher_id'])
 					{
 	?>
 		<tr>
 			<td><?php echo $row['subject_id'];?></td>
 			<td><?php echo $row['subject_name'];?></td>
 			<td><?php echo $row['subject_details'];?></td>
 			<td><?php echo $row['subject_date'].' '.date('h:m A', strtotime($row['subject_stime'])).' - '.date('h:m A', strtotime($row['subject_etime']));?></td>
 			<td><?php echo $row['subject_status']; ?></td>
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
 
 <?php	}	
 	?>		</table>

</body>
</html>