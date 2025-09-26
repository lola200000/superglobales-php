<?php
session_start();

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $event = $_GET['event'] ?? '';

    // Validation
    if (empty($nom)) {
        $errors[] = "Le nom est obligatoire.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide.";
    }
    if (strlen($password) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
    }

    // Si pas d'erreurs
    if (empty($errors)) {
        $_SESSION['nom'] = $nom;
        $_SESSION['email'] = $email;

        if (!empty($event)) {
            setcookie("event", $event, time() + 3600, "/"); // cookie 1 heure
        }

        header("Location: profil.php");
        exit;
    } else {
        foreach ($errors as $err) {
            echo $err . PHP_EOL;
        }
    }
} else {
    echo "Utilisez POST pour envoyer les données (nom, email, password)." . PHP_EOL;
}