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
    if (!isset($_GET['id_trace'])) {
        die("ID du projet non spécifié.");
    }
<<<<<<< ours
    $id_trace = {id_trace};
=======
    $id_trace = $stmt->insert_id;
    $id_trace = $_GET['id_trace'];
>>>>>>> theirs
    ?>
    <nav class="navbar navbar-expand-lg navbar-custom px-3">
  <button onclick="window.history.back()">Retour</button>
  <div class="navbar-nav me-auto">
<<<<<<< ours
    <a class="nav-link text-white" href="../accueil/accueil.html">Accueil</a>
    <a class="nav-link text-white" href="portfolioacadémique.php">Portfolio académique</a>
    <a class="nav-link text-white" href="../connexion/deconnexion.php">Déconnexion</a>
=======
    <a class="nav-link text-white" href="/code/portfolio/accueil/accueil.html">Accueil</a>
    <a class="nav-link text-white" href="portfolioacadémique.php">Portfolio académique</a>
    <a class="nav-link text-white" href="/code/portfolio/connexion/deconnexion.php">Déconnexion</a>
>>>>>>> theirs
  </div>
</nav>
<section>
    <div class="project-id">
        <h2>ID du Projet: <?php echo htmlspecialchars($id_trace); ?></h2>
    </div>
    <div class="projects-container">
        <div class="project-card">
            <div class="project-image">
               <p><img src="{fichier}" alt="Image du projet"></p>
            </div>
    <div class="project-details">
        <h1>Titre : {titre} </h1>
        <div>
        <p><strong>Année de BUT:</strong> {annee_but}</p>
        <p><strong>Compétence :</strong> {competence}</p>
        <p class="description"> {argumentaire}</p>
        <p><strong>Date:</strong> {date}</p>
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
