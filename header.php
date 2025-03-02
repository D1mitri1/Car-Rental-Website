<?php
session_start();
include_once '../includes/functions.php';

$isLoggedIn = isLoggedIn();
$isAdmin = isset($_SESSION['user']) && $_SESSION['user']['is_admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iKarRental</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<header>
    <nav>
        <a href="../pages/home.php">Home</a>

        <?php if ($isLoggedIn): ?>
            <a href="../pages/profile.php">Profile</a>
            <a href="../pages/logout.php">Logout</a>
        <?php else: ?>
            <a href="../pages/login.php">Login</a>
            <a href="../pages/register.php">Register</a>
        <?php endif; ?>

        <?php if ($isAdmin): ?>
            <a href="../pages/admin.php">Admin Panel</a>
        <?php endif; ?>
    </nav>
</header>
