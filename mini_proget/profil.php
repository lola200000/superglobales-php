<?php
session_start();

if (!isset($_SESSION['nom']) || !isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

$event = $_COOKIE['event'] ?? 'Aucun événement';

echo "=== Profil utilisateur ===" . PHP_EOL;
echo "Nom : " . $_SESSION['nom'] . PHP_EOL;
echo "Email : " . $_SESSION['email'] . PHP_EOL;
echo "Événement : " . $event . PHP_EOL;