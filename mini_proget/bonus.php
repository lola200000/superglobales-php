<?php
session_start();

$page = $_GET['page'] ?? 'index';

if ($page === 'index') {
    // === INDEX ===
    if (isset($_GET['event'])) {
        echo "Vous allez vous inscrire à l'événement : " . htmlspecialchars($_GET['event']) . PHP_EOL;
    }
    echo "Lien vers l'inscription : app.php?page=inscription&event=phpday" . PHP_EOL;

} elseif ($page === 'inscription') {
    // === INSCRIPTION ===
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $event = $_GET['event'] ?? '';

        // --- Validation des champs texte ---
        if ($nom === '') {
            $errors[] = "Le nom est obligatoire.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalide.";
        }
        if (strlen($password) < 8) {
            $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
        }

        // --- Validation et sauvegarde du fichier (bonus) ---
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $tmp = $_FILES['photo']['tmp_name'];
            $name = basename($_FILES['photo']['name']);
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                $errors[] = "Seulement les fichiers JPG et PNG sont autorisés.";
            } else {
                if (!is_dir("uploads")) {
                    mkdir("uploads", 0777, true);
                }
                $dest = "uploads/" . uniqid("img_") . "." . $ext;
                if (move_uploaded_file($tmp, $dest)) {
                    $_SESSION['photo'] = $dest;
                } else {
                    $errors[] = "Erreur lors de l'upload du fichier.";
                }
            }
        }

        // --- Si pas d'erreurs ---
        if (empty($errors)) {
            $_SESSION['nom'] = $nom;
            $_SESSION['email'] = $email;
            if ($event !== '') {
                setcookie("event", $event, time() + 3600, "/");
            }
            header("Location: app.php?page=profil");
            exit;
        } else {
            foreach ($errors as $err) {
                echo $err . PHP_EOL;
            }
        }
    } else {
        echo "Utilisez POST pour envoyer nom, email, password et éventuellement photo." . PHP_EOL;
    }

} elseif ($page === 'profil') {
    // === PROFIL ===
    if (!isset($_SESSION['nom']) || !isset($_SESSION['email'])) {
        header("Location: app.php?page=index");
        exit;
    }

    $event = $_COOKIE['event'] ?? 'Aucun événement';

    echo "=== Profil utilisateur ===" . PHP_EOL;
    echo "Nom : " . $_SESSION['nom'] . PHP_EOL;
    echo "Email : " . $_SESSION['email'] . PHP_EOL;
    echo "Événement : " . $event . PHP_EOL;

    if (isset($_SESSION['photo'])) {
        echo "Fichier photo enregistré : " . $_SESSION['photo'] . PHP_EOL;
    }

} else {
    echo "Page inconnue.";
}