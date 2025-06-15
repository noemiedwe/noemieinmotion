<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio-DEWE-Noemie</title>
    <link rel="stylesheet" href="professionnel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php session_start();
    $role = $_SESSION['role'] ?? 'inconnu';
    if(isset($_GET['Visiteur']) &&
    $_GET['Visiteur'] == 1){
        $_SESSION['id_utilisateur'] = '1';
        $_SESSION['role'] ='Visiteur';
<<<<<<< ours
        header("Location: ../projet/portfolioacadémique.php");
=======
        header("Location: /code/portfolio/projet/portfolioacadémique.php");
>>>>>>> theirs
        exit;
    }
?>
<nav class="navbar navbar-expand-lg navbar-custom px-3">
  <button onclick="window.history.back()">Retour</button>
  <div class="navbar-nav me-auto">
<<<<<<< ours
    <a class="nav-link text-white" href="../accueil/accueil.html">Accueil</a>
    <a class="nav-link text-white" href="../connexion/deconnexion.php">Déconnexion</a>
    <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'Concepteur') {
                echo '<a class="nav-link text-white" href="../connexion/role.php">Profil</a>';
=======
    <a class="nav-link text-white" href="/code/portfolio/accueil/accueil.html">Accueil</a>
    <a class="nav-link text-white" href="/code/portfolio/connexion/deconnexion.php">Déconnexion</a>
    <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'Concepteur') {
                echo '<a class="nav-link text-white" href="/code/portfolio/connexion/role.php">Profil</a>';
>>>>>>> theirs
            }
            ?>
  </div>
</nav>
<section>
    <div class="div1">
        <h1 class="h1">Portfolio Académique</h1>
        <p class="p1">Dewé Noémie</p>
    </div>
</section>
<section>
     <?php if ($role === 'Concepteur'): ?>
        <h3>Ajouter un Projet</h3>
<<<<<<< ours
        <form action="../projet/ajoutprojet.php" method="post" enctype="multipart/form-data">
=======
        <form action="/code/portfolio/projet/ajoutprojet.php" method="post" enctype="multipart/form-data">
>>>>>>> theirs
            <label for="numero_immatriculation">id :</label>
            <input type="text" id="numero_immatriculation" name="numero_immatriculation" required>
            <br>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
            <br>
            <label for="id_type">Type:</label>
            <select id="id_type" name="id_type" required>
                <option value="" disabled selected>Choisissez un type</option>
                <option value="infographie">Infographie</option>
                <option value="vidéo">Vidéo</option>
                <option value="programme">Programme</option>
                <option value="texte">Texte</option>
                <option value="image">Image</option>
            </select>
            <br>
            <label for="annee_but">Année de BUT:</label>
            <select id="annee_but" name="annee_but" required>
                <option value="" disabled selected>Choisissez une année</option>
                <option value="BUT1">BUT MMI 1</option>
                <option value="BUT2">BUT MMI 2</option>
                <option value="BUT3">BUT MMI 3</option>
            </select>
            <br>
            <label for="competence">Compétence :</label>
            <input type="text" id="competence" name="competence" required>
            <br>
            <label for="argumentaire">Argumentaire:</label>
            <textarea id="argumentaire" name="argumentaire" required></textarea>
            <br>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
            <br>
            <label for="fichier">Ajouter un fichier (texte, image, vidéo):</label>
            <input type="file" id="fichier" name="fichier" accept="image/*,video/*">
            <br>
            <button type="submit">Ajouter le Projet</button>
        </form>
        <?php endif; ?>
        <h1>Trier</h1>
    <form action="traitement_tri_traces.php" method="post">
        <label for="id_type">Type :</label>
        <select id="id_type" name="id_type">
            <option value="">Tous les types</option>
            <option value="infographie">Infographie</option>
            <option value="vidéo">Vidéo</option>
            <option value="programme">Programme</option>
            <option value="texte">Texte</option>
            <option value="image">Image</option>
        </select>
        <label for="annee_but">Année de BUT :</label>
        <select id="annee_but" name="annee_but">
            <option value="">Toutes les années</option>
            <option value="BUT1">BUT MMI 1</option>
            <option value="BUT2">BUT MMI 2</option>
            <option value="BUT3">BUT MMI 3</option>
        </select>
        <label for="date_ajout">Date d'Ajout :</label>
        <input type="date" id="date_ajout" name="date_ajout">
        <label for="competence">Compétence du BUT :</label>
        <input type="text" id="competence" name="competence">
        <br>
<<<<<<< ours
        <button type="submit">Trier les traces</button>
=======
        <button type="submit">Trier les Traces</button>
>>>>>>> theirs
    </form>
    <h2>Projets</h2>
    <div class="projects-container">
    <?php
<<<<<<< ours
    include '../connexion/connexionDB.php';

    $sql = "SELECT * FROM traces";
=======
    include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';

    $sql = "SELECT * FROM Traces";
>>>>>>> theirs
    $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="project-card">';
                echo '<h3>' . htmlspecialchars($row['titre']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['date']) . '</p>';
                

            $fichier = $row["fichier"];
            if (file_exists($fichier) && is_file($fichier)) {
                $info = getimagesize($fichier);
                if ($info !== false) {
                    echo "<img src='".$fichier."' alt='Image' style='max-width: 100px; max-height: 100px;'>";
                } else {
                    echo "<a href='".$fichier."'>Télécharger le fichier</a>";
                }
            } else {
                echo "Fichier non trouvé.";
            }
            echo '
                <form action="afficher_projet.php" method="post">
                    <input type="hidden" name="id_trace" value='.$row["id_trace"].'>
<<<<<<< ours
                    <button type="show">Voir le projet</button>
=======
                    <a href="projet_' . $row["id_trace"] . '.php">Voir le projet</a>
>>>>>>> theirs
                </form>';
            if ($_SESSION['role'] === 'Concepteur') {
                echo '<a href="modifier_trace.php?id=' . $row['id_trace'] . '">Modifier</a> | ';
                echo '<a href="supprimer_trace.php?id=' . $row['id_trace'] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette trace ?\')">Supprimer</a>';
            }
                echo '</div>';
        }}
        else {
            echo "aucun projet";
        }

    $conn->close();
    ?>
    </div>
</table>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>