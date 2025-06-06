<?php
 include '../../dbconnect.php';

 if (isset($_GET['id'])) {
     $id = htmlspecialchars($_GET['id']);
     $stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
     $stmt->execute(['id' => $id]);
     header("Location: list.php");
 } 
     header("Location: list.php");

?>