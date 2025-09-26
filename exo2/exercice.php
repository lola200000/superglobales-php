<?php
echo "<h2>Formulaire GET</h2>";
echo '<form method="get">
Ville : <input type="text" name="ville">
Pays : <input type="text" name="pays">
<button type="submit">Envoyer (GET)</button>
</form>';

if (!empty($_GET['ville']) && !empty($_GET['pays'])) {
echo "Vous habitez à " . htmlspecialchars($_GET['ville']) . ", " . htmlspecialchars($_GET['pays']) . " (via GET)<br>";
}

echo "<h2>Formulaire POST</h2>";
echo '<form method="post">
Ville : <input type="text" name="ville">
Pays : <input type="text" name="pays">
<button type="submit">Envoyer (POST)</button>
</form>';

if (!empty($_POST['ville']) && !empty($_POST['pays'])) {
echo "Vous habitez à " . htmlspecialchars($_POST['ville']) . ", " . htmlspecialchars($_POST['pays']) . " (via POST)<br>";
}
?>
