<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("UPDATE user SET deleted=1  WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>