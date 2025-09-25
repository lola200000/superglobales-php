<?php
// Exemple d'URL : http://localhost/exo1_get_server/exercice.php?ville=Paris&pays=France

if (!empty($_GET['ville']) && !empty($_GET['pays'])) {
echo "Ville : " . htmlspecialchars($_GET['ville']) . "<br>";
echo "Pays : " . htmlspecialchars($_GET['pays']) . "<br>";
} else {
echo "Veuillez fournir une ville et un pays dans l'URL.<br>";
}

echo "Méthode : " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Script : " . $_SERVER['PHP_SELF'] . "<br>";
?>