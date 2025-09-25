<?php
echo '<form method="get">
Nom : <input type="text" name="nom">
<button type="submit">Envoyer</button>
</form>';

if (!empty($_GET['nom'])) {
echo "Bonjour " . htmlspecialchars($_GET['nom']);
}
?>
