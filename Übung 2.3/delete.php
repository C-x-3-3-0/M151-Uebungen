<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br />";
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dropConstraint = $conn->prepare("ALTER TABLE order_details DROP FOREIGN KEY fk_order_details_orders");
$dropConstraint->execute();

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$id = (int)$_GET['id'];

$statement = $conn->prepare("DELETE FROM order_details WHERE order_id = :id");
$statement->execute(array(':id' => $id));

$statement = $conn->prepare("DELETE FROM orders WHERE id = :id");
$statement->execute(array(':id' => $id));

?>