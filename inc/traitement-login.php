<?php
session_start();
include 'connexion.php';

if (!$dataBase) die('echec connexion');

$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';

$res = mysqli_query($dataBase, "SELECT * FROM utilisateurs WHERE username='$user' AND password='$pass'");
if ($res && mysqli_fetch_assoc($res)) {
    $_SESSION['username'] = $user;
    header('Location: ../pages/admin-dashboard.php');
} else {
    header('Location: ../pages/admin-log.php?error=1');
}
exit;
?>