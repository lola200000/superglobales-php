<?php
session_start();

if (isset($_GET['event'])) {
    echo "Vous allez vous inscrire à l'événement : " . htmlspecialchars($_GET['event']) . PHP_EOL;
}

echo "Lien vers l'inscription : inscription.php?event=phpday" . PHP_EOL;