<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
/*
Für was ist "mysql"?
"mysql" im Code bezieht sich auf das verwendete Datenbankverwaltungssystem.
*/
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
/*
Die Zeile "$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);" setzt den Fehlerbehandlungsmodus für die Datenbankverbindung, die durch das "$conn"-Objekt repräsentiert wird.

Die Konstante PDO::ATTR_ERRMODE ist ein Attribut, das den Fehlermeldemodus für eine PDO-Datenbankverbindung festlegt. Die Konstante PDO::ERRMODE_EXCEPTION spezifiziert den Fehlermeldemodus 
als Ausnahmen. Das bedeutet, dass beim Auftreten von Fehlern während der Datenbankoperationen eine Ausnahme ausgelöst wird. 
*/
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br />";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
echo "<h2>Datenausgabe</h2>";
$statement = $conn->prepare("SELECT * FROM customers");
$statement->execute();
while($row = $statement->fetch()) {
   echo $row['first_name']." ".$row['last_name']."<br />";
}
?>




