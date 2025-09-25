<?php
$email = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = trim($_POST['email']);

if (empty($email)) {
$errors[] = "Erreur : email vide.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$errors[] = "Erreur : email invalide.";
}

if (empty($errors)) {
echo "<p style='color:green'>Email valide : " . htmlspecialchars($email) . "</p>";
} else {
foreach ($errors as $err) {
echo "<p style='color:red'>$err</p>";
}
}
}

echo "<h2>Démo - Validation Email</h2>";
echo "<form method='post'>";
echo "Email : <input type='text' name='email' value='" . htmlspecialchars($email) . "'>";
echo "<button type='submit'>OK</button>";
echo "</form>";
