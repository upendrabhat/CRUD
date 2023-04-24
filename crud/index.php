<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>
	<div class="box1">
	<h2>ALL STUDENTS</h2>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
	ADD STUDENT
	</button>
	</div>
	<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Age</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = "SELECT * FROM `student`;";
				$result = mysqli_query($connection, $query);
				if(!$result){
					die("query failed".mysqli_error());
				}
				else{
					while($row = mysqli_fetch_assoc($result)){
						?>
							<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['first_name']; ?></td>
							<td><?php echo $row['last_name']; ?></td>
							<td><?php echo $row['age']; ?></td>
							<td><a href="update_page.php?id=<?php echo $row['id']; ?>"class="btn btn-success">Update</a></td>
							<td><a href="delete page.php?id=<?php echo $row['id']; ?>"class="btn btn-danger">Delete</a></td>
							</tr>
						<?php	
						}
				}
			?>
		</tbody>
	</table>
	<?php
		if(isset($_GET['message'])){
			echo "<h6>".$_GET['message']."</h6>";
		}
	?>
	<?php
		if(isset($_GET['insert_message'])){
			echo "<h5>".$_GET['insert_message']."</h5>";
		}
	?>
	<?php
		if(isset($_GET['update_msg'])){
			echo "<h5>".$_GET['update_msg']."</h5>";
		}
	?>
	<?php
		if(isset($_GET['delete_msg'])){
			echo "<h6>".$_GET['delete_msg']."</h6>";
		}
	?>
	<?php
	if(isset($_POST['update_students'])){
		if(isset($_GET['id_new'])){
			$idnew=$_GET['id_new'];
		}
		$fname = $_POST['f_name'];
		$lname = $_POST['f_name'];
		$age = $_POST['age'];
		$query = "UPDATE `student` SET `first_name`='$fname',`last_name`='$lname',`age`='$age' WHERE id=$idnew;";
		$result = mysqli_query($connection, $query);
				if(!$result){
					die("query failed".mysqli_error());
				}
				else{
					header('location:index.php?update_msg=successfully updated');
					}
	}
	?>
</div>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
<!-- Button trigger modal -->


<!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

	  <div class="form-group">
			<label for="f_name">First name</label>
			<input type="text" name="f_name" class="form-control">
	  </div>
	  <div class="form-group">
			<label for="l_name">Last Name</label>
			<input type="text" name="l_name" class="form-control">
	  </div>
	  <div class="form-group">
			<label for="age">Age</label>
			<input type="int" name="age" class="form-control">
	  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <INPUT type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>