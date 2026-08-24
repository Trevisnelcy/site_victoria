<?php
session_start();
include 'includes/header.php';
?>

<h2>Bienvenue aux Chutes Victoria</h2>

<!-- PHOTO PRINCIPALE -->
<div>
    <img src="images/chutes1.jpg" alt="Vue panoramique des Chutes Victoria" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 8px;">
</div>

<p style="margin-top: 1rem;">Les chutes Victoria sont l'une des spectaculaires chutes d'eau du monde. Elles sont situées sur le fleuve Zambèze, qui constitue à cet endroit la frontière entre la Zambie et le Zimbabwe.</p>

<section>
    <h3>Informations Clés</h3>
    <ul style="list-style-position: inside; margin-top: 0.5rem;">
        <li><strong>Largeur :</strong> Plus de 1 700 mètres</li>
        <li><strong>Hauteur :</strong> Jusqu'à 108 mètres</li>
        <li><strong>Nom local :</strong> Mosi-oa-Tunya (La fumée qui gronde)</li>
        <li><strong>Statut :</strong> Patrimoine mondial de l'UNESCO</li>
    </ul>
</section>

<!-- GALERIE DE PHOTOS -->
<section>
    <h3>Aperçu du site</h3>
    <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 0.8rem;">
        <img src="images/chutes2.jpg" alt="Canyon du Zambèze" style="width: 48%; border-radius: 6px; object-fit: cover;">
        <img src="images/chutes3.jpg" alt="Arc-en-ciel sur les chutes" style="width: 48%; border-radius: 6px; object-fit: cover;">
    </div>
</section>

<section>
    <h3>Découvrez nos activités</h3>
    <p>Consultez la page <a href="activites.php">Activités & Visites</a> pour découvrir les parcours disponibles et laisser vos commentaires.</p>
</section>

<?php 
include 'includes/footer.php';
?>