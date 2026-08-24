<?php
session_start();
require_once 'config/db.php';
include 'includes/header.php';

$activites = [
    'helicoptere' => [
        'titre' => 'Survol en Hélicoptère (Le Vol des Anges)',
        'description' => 'Un survol impressionnant au-dessus du canyon et des chutes Victoria pour une vue panoramique inoubliable.',
        'image' => 'images/helicoptere.jpg'
    ],
    'rafting' => [
        'titre' => 'Rafting extrême sur le Fleuve Zambèze',
        'description' => 'Une aventure d\'eau vive à travers les rapides situés au bas des chutes d\'eau.',
        'image' => 'images/rafting.jpg'
    ],
    'devils-pool' => [
        'titre' => 'La Piscine du Diable (Devil\'s Pool)',
        'description' => 'Baignez-vous au bord du précipice dans un bassin naturel façonné par les rochers au sommet des chutes.',
        'image' => 'images/devils-pool.jpg'
    ],
    'gorge-zambeze' => [
        'titre' => 'Randonnée dans les Gorges du Zambèze',
        'description' => 'Explorez les sentiers pédestres serpentant le long des gorges spectaculaires et découvrez la faune locale.',
        'image' => 'images/gorge.jpg'
    ]
];
?>

<h2>Activités et Visites aux Chutes Victoria</h2>

<?php if (isset($_GET['succes']) && $_GET['succes'] == 'com_ajoute'): ?>
    <p style="color: green; font-weight: bold; margin-bottom: 1rem;">Votre commentaire a été publié avec succès.</p>
<?php endif; ?>

<?php foreach ($activites as $id_activite => $act): ?>
    <article id="<?= $id_activite ?>">
        <h3><?= htmlspecialchars($act['titre']) ?></h3>
        
        <div>
            <img src="<?= htmlspecialchars($act['image']) ?>" alt="<?= htmlspecialchars($act['titre']) ?>">
        </div>

        <p><?= htmlspecialchars($act['description']) ?></p>

        <section>
            <h4>Commentaires</h4>

            <?php if (isset($_SESSION['utilisateur_id'])): ?>
                <form action="actions/trait_commentaire.php" method="POST">
                    <input type="hidden" name="article_id" value="<?= $id_activite ?>">
                    <p>
                        <label for="com_<?= $id_activite ?>">Poster un commentaire :</label><br>
                        <textarea id="com_<?= $id_activite ?>" name="commentaire" rows="3" required></textarea>
                    </p>
                    <button type="submit">Publier</button>
                </form>
            <?php else: ?>
                <p><em>🔒 Vous devez être <a href="connexion.php">connecté</a> pour commenter cette photo.</em></p>
            <?php endif; ?>

            <div style="margin-top: 1.5rem;">
                <?php
                $stmt = $pdo->prepare("
                    SELECT c.contenu, c.date_publication, u.nom 
                    FROM commentaires c 
                    JOIN utilisateurs u ON c.utilisateur_id = u.id 
                    WHERE c.article_id = ? 
                    ORDER BY c.date_publication DESC
                ");
                $stmt->execute([$id_activite]);
                $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php if (count($commentaires) > 0): ?>
                    <?php foreach ($commentaires as $com): ?>
                        <div>
                            <p style="margin: 0;">
                                <strong><?= htmlspecialchars($com['nom']) ?></strong> 
                                <small>(le <?= date('d/m/Y à H:i', strtotime($com['date_publication'])) ?>)</small>
                            </p>
                            <p style="margin-top: 5px;"><?= nl2br(htmlspecialchars($com['contenu'])) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="color: #666;">Aucun commentaire pour le moment. Soyez le premier !</p>
                <?php endif; ?>
            </div>
        </section>
    </article>
<?php endforeach; ?>

<?php include 'includes/footer.php'; ?>