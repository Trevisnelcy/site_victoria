<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Chutes Victoria</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body>
<header>
    <h1><a href="index.php">Les Chutes Victoria</a></h1>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="activites.php">Activités & Visites</a></li>
            
            <?php if (isset($_SESSION['utilisateur_id'])): ?>
                <li style="color: #caf0f8; font-weight: bold; background: rgba(255, 255, 255, 0.15); padding: 0.4rem 1rem; border-radius: 20px;">
                    👤 <?= htmlspecialchars($_SESSION['utilisateur_nom'] ?? $_SESSION['nom'] ?? 'Membre') ?>
                </li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<main>