<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    if (!empty($nom) && !empty($email) && !empty($mot_de_passe)) {
        $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)");
        try {
            $stmt->execute([$nom, $email, $hash]);
            header('Location: ../connexion.php?succes=inscrit');
            exit();
        } catch (PDOException $e) {
            header('Location: ../inscription.php?erreur=email_existant');
            exit();
        }
    }
}
?>