<?php
	session_start();
?>

<h1>Put in details of the class below:</h1>
<form action="api/create-class.php" method="post">

	Class Name
	<br/>
	<input type="text" size="50" name="name">
	<br/>
	Description
	<br/>
	<textarea name="description"></textarea>
	<br/>
	<input type="submit" name="submit">

</form>
