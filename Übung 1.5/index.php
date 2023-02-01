<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $class = $_POST['class'];

    if (!isset($username) || trim($username) === '') {
        echo "Bitte geben Sie einen Namen ein.";
        exit();
    }

    echo "Hallo {$username}! Du bist in Klasse {$class}.";
}
?>
<form method="POST" action="?">
    <input type="text" name="name" placeholder="Benutzername" />
    <select name="class">
        <option value="">Wähle deine Klasse</option>
        <option value="D18a">D18a</option>
        <option value="D19a">D19a</option>
        <option value="D20a">D20a</option>
        <option value="D21a">D21a</option>
    </select>
    <input type="submit" value="Absenden" />
</form>
