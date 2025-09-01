<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM commission WHERE id=$id");
header("Location: index.php#contact");
?>
