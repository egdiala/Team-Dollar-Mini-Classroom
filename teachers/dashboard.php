<?php
session_start();
require "logincheck.php";
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<title>Mini Class - Teacher Login</title>
</head>
<body>
	<h2>Welcome Mini Class Teacher</h2>

	<?php
		require "api/get-classes.php"
	?>

	<div>
		<h1>Hi <span ng-bind="name"></span></h1>

		<table border="1">
		  <tr>
		  	<td>S/N</td>
		  	<td>Class Id</td>
		  	<td>Class Name</td>
		  	<td>Action</td>
		  </tr>

		<?php
			for($i = 0; $i < count($feedback); $i++) {
				$row = $feedback[$i];
		?>
			  <tr>
			    <td><?php echo ($i+1); ?></td>
			    <td><?php echo $row["cid"]; ?></td>
			    <td><?php echo $row["name"] ?></td>
			    <td><a href="class-view.php?cid=<?php echo $row["cid"]; ?>">View</a></td>
			  </tr>
		<?php
			}
		?>
		</table>

		<h2><a href="create-class-view.php">Create Class</a></h2>
	</div>


</body>
</html>