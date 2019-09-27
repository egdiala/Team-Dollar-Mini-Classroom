<?php
session_start();
?>

<?php
	require "api/get-class.php";

	echo "<h1>Class: " .  $class["name"] . "</h1>";
	echo "<br/>";
	echo "Description: <br/>";
	echo "<br/>";
	echo $class["description"];
?>


<?php
require "api/get-items.php";
$itemcount = count($items);

?>

<p>This class has <?php echo $itemcount; ?> item(s):</p>

<table border="1">
	<tr>
		<td>iid</td>
		<td>name</td>
		<td>description</td>
		<td>classId</td>
		<td>teacherId</td>
		<td>date_added</td>
	</tr>

	<?php
		for($i = 0; $i < $itemcount; $i++) {
			$row = $items[$i];
	?>
	<tr>
		<td><?php echo $row["iid"] ?></td>
		<td><?php echo $row["name"] ?></td>
		<td><?php echo $row["description"] ?></td>
		<td><?php echo $row["classId"] ?></td>
		<td><?php echo $row["teacherId"] ?></td>
		<td><?php echo $row["date_added"] ?></td>
	</tr>
	<?php
		}
	?>
</table>

<h2><a href="create-item-view.php?cid=<?php echo $class['cid'] ?>">Create Item</a></h2>