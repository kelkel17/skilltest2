<?php 
	require_once("dbcon.php");
	
			if(isset($_POST['addSubject']))
			{
				$student = $_POST['student'];
				$subject = $_POST['subject'];
				$stat = "Enrolled";

				$sql = "INSERT INTO student_subjects(student_id, subject_id,status) VALUES(?,?,?)";
				$con = con();
				$stmt = $con->prepare($sql);
				$stmt->execute(array($student,$subject,$stat));
				 echo '<script> alert("Good Luck Pikot :)"); window.location="studentmanagement.php" </script>';

			}

		$con = null;

?>