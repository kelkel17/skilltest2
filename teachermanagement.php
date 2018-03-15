<?php
	require_once("dbcon.php");
	$teachers = viewAllTeachers();

	if(isset($_GET['tid'])){
		$id = $_GET['tid'];
		deleteTeacher(array($id));
	}
		
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <center><h1>Teacher Management</h1></center>
 <br /><br /><br />
 <a href="addteacher.php"><button class="myButton">Add Teacher</button></a>
 <a href="index.php"><button class="myButton">Go Back!</button></a>
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
</body>
</html>