<Style>
    table,
td,
th {
	border: 1px solid black;
}
</Style>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br />";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$id = (int)$_GET['id'];

$statement = $conn->prepare("SELECT * FROM orders WHERE customer_id = :id");
$statement->execute(array(':id' => $id));
echo "<td><a href='index.php"."'>Zurück</a></td>";
echo "<h2>Bestellung</h2>";
?>
<table>
    <tr>
        <th>Bestelldatum</th>
        <th>Versanddatum</th>
        <th>Name</th>
        <th>Adresse</th>
        <th>Stadt</th>
    </tr>
    <?php
    while($row = $statement->fetch()){
        echo "<tr>";
            echo "<td>{$row['order_date']}</td>";
            echo "<td>{$row['shipped_date']}</td>";
            echo "<td>{$row['ship_name']}</td>";
            echo "<td>{$row['ship_address']}</td>";
            echo "<td>{$row['ship_city']}</td>";
            echo "<td><a href='delete.php?id=".htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8')."'>Bestellungen löschen</a></td>";
        echo "</tr>";
    }
?>
</table>