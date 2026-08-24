<?php session_start(); include 'includes/header.php'; ?>
<h2>Inscription</h2>
<form action="actions/trait_inscription.php" method="POST" style="max-width: 400px;">
    <p>
        <label>Nom complet :</label>
        <input type="text" name="nom" required>
    </p>
    <p>
        <label>Email :</label>
        <input type="email" name="email" required>
    </p>
    <p>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>
    </p>
    <button type="submit">S'inscrire</button>
</form>
<?php include 'includes/footer.php'; ?>