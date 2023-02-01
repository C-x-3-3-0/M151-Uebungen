<h1>Pizza Konfigurator</h1>

<?php
$defaultToppings = ['Salami', 'Zwiebeln', 'Speck'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $toppings = isset($_POST['toppings']) ? array_merge($defaultToppings, $_POST['toppings']) : $defaultToppings;
    echo "Deine Pizza besteht aus folgenden Toppings:<br>";
    foreach ($toppings as $topping) {
        echo "{$topping}<br>";
    }
} else {
    echo "Deine Pizza besteht aus folgenden Toppings:<br>";
    foreach ($defaultToppings as $topping) {
        echo "•{$topping}<br>";
    }
}
?>

<form method="POST" action="">
    <h3>Füge weitere Zutaten hinzu:
    <input type="text" name="new_topping" placeholder="Zutat" /></h3>
    <input type="submit" value="Hinzufügen" />
    <input type="hidden" name="toppings[]" value="" />
</form>
