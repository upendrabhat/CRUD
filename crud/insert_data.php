<?php include("dbcon.php"); ?>
<?php

if(isset($_POST['add_students']))
{
	
	$fname = $_POST['f_name'];
	$lname = $_POST['l_name'];
	$age = $_POST['age'];
	
	if($fname == "" || empty($fname)){
		header('location:index.php?message=you need to fill first name');
	}
	else{
		$query = "INSERT INTO `student`(`first_name`, `last_name`, `age`) VALUES ('$fname','$lname','$age');";
		$result = mysqli_query($connection,$query,);
		
		if(!$result){
			die("Query failed".mysqli_error());
		}
		
		else{
			header('location:index.php?insert_message=Your data has been added successfully');
		}
	}
}
?>