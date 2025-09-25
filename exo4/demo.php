<?php
session_start();

if (!isset($_SESSION['user'])) {
$_SESSION['user'] = "Pedri"; // valeur par défaut
}

// Cookie valable 1h
setcookie("last_visit", date("d/m/Y H:i"), time() + 3600);

echo "<h2>Démo - Sessions et Cookies</h2>";
echo "Bonjour " . $_SESSION['user'] . "<br>";

if (isset($_COOKIE['last_visit'])) {
echo "Dernière visite : " . $_COOKIE['last_visit'];
} else {
echo "C'est votre première visite !";
}

