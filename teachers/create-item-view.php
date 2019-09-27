<?php
	session_start();
?>

<h1>Put in details of the item below:</h1>
<form action="api/create-item.php" method="post">

	Item Name
	<br/>
	<input type="text" size="50" name="name">

	<br/>
	Description
	<br/>
	<textarea name="description"></textarea>
	<br/>
	<input type="hidden" size="50" name="cid" value="<?php echo $_GET['cid'] ?>">
	<input type="submit" name="submit">

</form>
