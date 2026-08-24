<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: ../connexion.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $article_id = trim($_POST['article_id']);
    $commentaire = trim($_POST['commentaire']);
    $utilisateur_id = $_SESSION['utilisateur_id'];

    if (!empty($article_id) && !empty($commentaire)) {
        $stmt = $pdo->prepare("INSERT INTO commentaires (article_id, utilisateur_id, contenu) VALUES (?, ?, ?)");
        $stmt->execute([$article_id, $utilisateur_id, $commentaire]);

        header("Location: ../activites.php?succes=com_ajoute#{$article_id}");
        exit();
    } else {
        header('Location: ../activites.php');
        exit();
    }
} else {
    header('Location: ../activites.php');
    exit();
}