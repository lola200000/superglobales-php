<?php
session_start();

// Déconnexion
if (isset($_GET['logout'])) {
session_destroy();
setcookie("last_visit", "", time() - 3600); // supprime le cookie
header("Location: exercice.php");
exit;
}

// Connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = trim($_POST['username']);
if (!empty($username)) {
$_SESSION['username'] = $username;
setcookie("last_visit", date("d/m/Y H:i"), time() + 3600); // cookie valable 1h
}
}

if (!isset($_SESSION['username'])) {
echo "<h2>Login</h2>";
echo "<form method='post'>";
echo "Username : <input type='text' name='username'>";
echo "<button type='submit'>Se connecter</button>";
echo "</form>";
} else {
echo "<h2>Profil</h2>";
echo "Bonjour " . htmlspecialchars($_SESSION['username']) . "<br>";

if (isset($_COOKIE['last_visit'])) {
echo "Dernière visite : " . $_COOKIE['last_visit'] . "<br>";
} else {
echo "C'est votre première visite !<br>";
}

echo "<a href='?logout=1'>Se déconnecter</a>";
}