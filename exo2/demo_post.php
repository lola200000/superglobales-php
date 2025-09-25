<?php
echo '<form method="post">
Nom : <input type="text" name="nom">
<button type="submit">Envoyer</button>
</form>';

if (!empty($_POST['nom'])) {
echo "Bonjour " . htmlspecialchars($_POST['nom']);
}
?>
