<?php session_start(); include 'includes/header.php'; ?>
<h2>Connexion</h2>
<form action="actions/trait_connexion.php" method="POST" style="max-width: 400px;">
    <p>
        <label>Email :</label>
        <input type="email" name="email" required>
    </p>
    <p>
        <label>Mot de passe :</label>
        <input type="password" name="mot_de_passe" required>
    </p>
    <button type="submit">Se connecter</button>
</form>
<?php include 'includes/footer.php'; ?>