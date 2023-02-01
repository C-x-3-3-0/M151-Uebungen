<?php
$x = $_GET["x"];
$y = $_GET["y"];
$mode = $_GET["mode"];

if (!isset($x) || !isset($y) || !isset($mode)) {
    echo "Geben sie alle forgelangende parameters mit: x, y, und mode.";
    exit();
}

$x = intval($x);
$y = intval($y);

switch ($mode) {
    case "add":
        $result = $x + $y;
        break;
    case "subtract":
        $result = $x - $y;
        break;
    case "multiply":
        $result = $x * $y;
        break;
    case "divide":
        if ($y == 0) {
            echo "Kann nicht durch 0 dividiert werden.";
            exit();
        }
        $result = $x / $y;
        break;
    default:
        echo "Invalid mode.";
        exit();
}

echo $result;
?>
