<?php
$errors = [];
$nom = $email = $age = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nom = trim($_POST['nom']);
$email = trim($_POST['email']);
$age = trim($_POST['age']);

if (empty($nom)) {
$errors[] = "Le nom ne doit pas être vide.";
}

if (empty($email)) {
$errors[] = "L'email est obligatoire.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors[] = "Email invalide.";
}

if (!ctype_digit($age) || intval($age) <= 0) {
$errors[] = "L'âge doit être un entier positif.";
}

if (empty($errors)) {
echo "<h2 style='color:green'>Données valides :</h2>";
echo "Nom : " . htmlspecialchars($nom) . "<br>";
echo "Email : " . htmlspecialchars($email) . "<br>";
echo "Âge : " . intval($age);
} else {
echo "<h2 style='color:red'>Erreurs :</h2>";
foreach ($errors as $err) {
echo "<p>$err</p>";
}
}
}

echo "<h2>Exercice 3 - Validation Nom, Email, Âge</h2>";
echo "<form method='post'>";
echo "Nom : <input type='text' name='nom' value='" . htmlspecialchars($nom) . "'><br>";
echo "Email : <input type='text' name='email' value='" . htmlspecialchars($email) . "'><br>";
echo "Âge : <input type='number' name='age' value='" . htmlspecialchars($age) . "'><br>";
echo "<button type='submit'>Valider</button>";
echo "</form>";
