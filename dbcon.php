<?php 
	function con(){
		return new PDO("mysql:host=localhost;dbname=skill2",'root','');
	}
	//STUDENTS
	function addStudent($data){
		$con = con();
		$sql = "INSERT INTO students(student_fname,student_mname,student_lname,student_age,student_gender,student_bdate,student_year,student_course) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $con->prepare($sql);
		$insert = $stmt->execute($data);
		$con = null;

		if($insert){
			header("Location: studentmanagement.php");
		}
		else
		{
			die("Error in Adding Student");
			header("addstudent.php");
		}
	}

	function viewAllStudents(){
		$con = con();
		$sql = "SELECT * FROM students";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$view = $stmt->fetchAll();
		$con = null;

		return $view;
	}

	function getStudent($data){
			$con = con();
			$sql = "SELECT * FROM students WHERE student_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->execute($data); 
			$rows = $stmt->fetchAll();
			$con = null;

			return $rows;
	}

	function updateStudent($data){
		$con = con();
		$sql = "UPDATE students SET student_fname = ?, student_mname = ?, student_lname = ?, student_age = ?, student_gender = ?, student_bdate = ?, student_year = ?, student_course = ? WHERE student_id = ?";
		$stmt = $con->prepare($sql);
		$update = $stmt->execute($data);
		$con = null;

		if($update)
		{
			header("Location: studentmanagement.php");
		}
		else
		{
			die("Error in Updating Student.");
		}
	}

	function deleteStudent($data){
		$con = con();
		$sql = "DELETE FROM students where student_id = ?";
		$stmt = $con->prepare($sql);
		$delete = $stmt->execute($data);
		$con = null;

		if($delete)
		{
			header("Location: studentmanagement.php");
		}
		else
		{
			die("Error in Deleting Student");
		}
	}

	//TEACHERS
	function addTeacher($data){
		$con = con();
		$sql = "INSERT INTO teachers(teacher_fname, teacher_mname, teacher_lname, teacher_phone, teacher_address) VALUES(?, ?, ?, ?, ?)";
		$stmt = $con->prepare($sql);
		$insert = $stmt->execute($data);
		$con = null;

		if($insert){
			header("Location: teachermanagement.php");
		}
		else{
			die("Error in Adding Teacher.");
		}

	}

	function viewAllTeachers(){
		$con = con();
		$sql = "SELECT * FROM teachers";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$con = null;

		return $view;
	}

	function getTeacher($data){
		$con = con();
		$sql = "SELECT * FROM teachers WHERE teacher_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute($data);
		$rows = $stmt->fetchAll();
		$con = null;

		return $rows;
	}

	function updateTeacher($data){
		$con = con();
		$sql = "UPDATE teachers SET teacher_fname = ?, teacher_mname = ?, teacher_lname = ?, teacher_phone = ?, teacher_address = ? WHERE teacher_id = ?";
		$stmt = $con->prepare($sql);
		$update = $stmt->execute($data);
		$con = null;

		if($update){
			header("Location: teachermanagement.php");
		}
		else{
			die("Error in Updating Teacher.");
		}
	}

	function deleteTeacher($data){
		$con = con();
		$sql = "DELETE FROM teachers WHERE teacher_id = ?";
		$stmt = $con->prepare($sql);
		$delete = $stmt->execute($data);
		$con = null;

		if($delete){
			header("Location: teachermanagement.php");	
		}
		else
		{
			die("Error in Deleting a Teacher");
		}
	}



	//SUBJECTS

	function addSubject($data){
		$con = con();
		$sql = "INSERT INTO subjects(subject_name, subject_details, subject_stime, subject_etime, subject_date, subject_status, teacher_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$stmt = $con->prepare($sql);
		$insert = $stmt->execute($data);
		$con = null;

		if($insert){
			header("Location: subjectmanagement.php");
		}
		else{
			die("Error in Adding a Subject");
		}
	}

	function viewAllSubjects(){
		$con = con();
		$sql = "SELECT * FROM subjects";
		$stmt = $con->prepare($sql);
		$stmt->execute();
		$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$con = null;

		return $view;
	}



	function getSubject($data){
		$con = con();
		$sql = "SELECT * FROM subjects AS s INNER JOIN teachers AS t ON s.teacher_id = t.teacher_id WHERE subject_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute($data);
		$rows = $stmt->fetchAll();
		$con = null;

		return $rows;
	}



	function updateSubject($data){
		$con = con();
		$sql = "UPDATE subjects SET subject_name = ?, subject_details = ?, subject_stime = ?, subject_etime = ?, subject_date = ?, teacher_id = ?, subject_status = ? WHERE subject_id = ?";
		$stmt = $con->prepare($sql);
		$update = $stmt->execute($data);
		$con = null;

		if($update){
			header("Location: subjectmanagement.php");
		}
		else{
			die("Error in Updating Subject.");
		}
	}

	function deleteSubject($data){
		$con = con();
		$sql = "DELETE FROM subjects WHERE subject_id = ?";
		$stmt = $con->prepare($sql);
		$delete = $stmt->execute($data);
		$con = null;

		if($delete){
			header("Location: subjectmanagement.php");
		}
		else{
			die("Error in Deleting Subject.");
		}
	}
	function close($data){
		$con = con();
		$sql = "UPDATE subjects SET subject_status = ? WHERE subject_id = ?";
		$stmt = $con->prepare($sql);
		$update = $stmt->execute($data);
		$con = null;
		
	}


	function viewAllStudentSubjects($data){
			$con = con();
 			$sql = "SELECT * FROM students AS s INNER JOIN student_subjects AS d ON s.student_id = d.student_id INNER JOIN subjects a ON d.subject_id = a.subject_id WHERE s.student_id = ?";
			//$stmt = $con->pr
 			$stmt = $con->prepare($sql);
 			$stmt->execute($data);
 			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
 			$con = null;

 			return $view;
	}
	function viewAllSubjectStudents($data){
			$con = con();
 			$sql = "SELECT * FROM subjects AS s INNER JOIN student_subjects AS d ON s.subject_id = d.subject_id INNER JOIN students a ON d.student_id = a.student_id WHERE s.subject_id = ?";
			//$stmt = $con->pr
 			$stmt = $con->prepare($sql);
 			$stmt->execute($data);
 			$view = $stmt->fetchAll(PDO::FETCH_ASSOC);
 			$con = null;

 			return $view;
	}
	function getSubjectTeachers($data){
		$con = con();
		$sql = "SELECT * FROM subjects s, teachers t s.teacher_id = t.teacher_id WHERE t.teacher_id = ?";
		$stmt = $con->prepare($sql);
		$stmt->execute($data);
		$rows = $stmt->fetchAll();
		$con = null;

		return $rows;
	}



?>