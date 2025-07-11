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
<nav class="navbar navbar-expand-lg navbar-custom px-3">
  <button conclick="window.history.back()">Retour</button>
  <div class="navbar-nav me-auto">
    <a class="nav-link text-white" href="../accueil/index.html">Accueil</a>
    <a class="nav-link text-white" href="../connexion/connexion.php">Connexion</a>
  </div>
</nav>
    <section>
    <div class="div1">
        <h1 class="h1">Portfolio Professionnel</h1>
        <p class="p1">Dewé Noémie</p>
    </div>
    </section>
    <section>
           <h2>Projets</h2>
    <div class="projects-container">
    <?php
    include '../connexion/connexionDB.php';

    $sql = "SELECT * FROM traces";
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
                    <a href="projet_' . $row["id_trace"] . '.php">Voir le projet</a>
                </form>';
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
</body>
</html>
