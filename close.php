<?php
	if(isset($_GET['bid'])){
		$id = $_GET['bid'];
		$data = array($id);
		close(array($data));

		if(close()){
			header("Location: subjectmanagement.php");
		}
	}
?>