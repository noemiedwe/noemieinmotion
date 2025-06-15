<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet - <?php echo $id_trace; ?></title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
     <?php
    session_start();
    $role = $_SESSION['role'] ?? 'inconnu';

    // Récupérer l'ID du projet à partir de l'URL
    $id_trace = $stmt->insert_id;
    $id_trace = $_GET['id_trace'];
    ?>
    <nav class="navbar navbar-expand-lg navbar-custom px-3">
  <button onclick="window.history.back()">Retour</button>
  <div class="navbar-nav me-auto">
    <a class="nav-link text-white" href="/code/portfolio/accueil/accueil.html">Accueil</a>
    <a class="nav-link text-white" href="portfolioacadémique.php">Portfolio académique</a>
    <a class="nav-link text-white" href="/code/portfolio/connexion/deconnexion.php">Déconnexion</a>
  </div>
</nav>
<section>
    <div class="project-id">
        <h2>ID du Projet: <?php echo htmlspecialchars($id_trace); ?></h2>
    </div>
    <div class="projects-container">
        <div class="project-card">
            <div class="project-image">
               <p><img src="uploads/luge-2-places-avec-freins-bleu (1).webp" alt="Image du projet"></p>
            </div>
    <div class="project-details">
        <h1>Titre : fzkfshqjf </h1>
        <div>
        <p><strong>Année de BUT:</strong> fnskfn</p>
        <p><strong>Compétence :</strong> </p>
        <p class="description"> dsnsksnf</p>
        <p><strong>Date:</strong> 4555-12-31</p>
        </div>
    </div>
</section>
<section>
        <?php if ($role === 'Concepteur' || $role === 'Évaluateur'): ?>
            <div class="comments-section">
                <h4>Commentaires</h4>
                <div id="comments-container">
                    <!-- Les commentaires seront chargés ici dynamiquement -->
                    <?php include 'afficher_commentaires.php?id_trace= echo $id_trace;'; ?>
                </div>

                <form action="submit_comment.php" method="post" class="comment-form">
                    <input type="hidden" name="id_trace" value="<?php echo $id_trace; ?>">
                    <label for="utilisateur">Nom:</label>
                    <input type="text" id="utilisateur" name="utilisateur" value="<?php echo htmlspecialchars($_SESSION['utilisateur']); ?>" required>
                    <label for="commentaire">Commentaire:</label>
                    <textarea id="commentaire" name="commentaire" required></textarea>
                    <button type="submit">Poster le commentaire</button>
                </form>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>
