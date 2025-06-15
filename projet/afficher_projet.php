<?php
<<<<<<< ours
include '../connexion/connexionDB.php';
session_start(); 


$id_trace = isset($_POST['id_trace']) ? $_POST['id_trace'] : (isset($_GET['id_trace']) ? $_GET['id_trace'] : (isset($_SESSION['id_trace']) ? $_SESSION['id_trace'] : null));
if (!isset($id_trace)) {
    die("ID du projet non spécifié.");
}

if ($id_trace) {
    $sql = "SELECT * FROM traces WHERE id_trace = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_trace);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Projet - <?php echo htmlspecialchars($row["titre"] ?? ''); ?></title>
            <link rel="stylesheet" href="projet.css">

        </head>
        <body>
            <?php
            $role = $_SESSION['role'] ?? 'inconnu';
            ?>
            <nav class="navbar navbar-expand-lg navbar-custom px-3">
                <button onclick="window.history.back()">Retour</button>
                <div class="navbar-nav me-auto">
                    <a class="nav-link text-white" href="../accueil/accueil.html">Accueil</a>
                    <a class="nav-link text-white" href="portfolioacadémique.php">Portfolio académique</a>
                    <a class="nav-link text-white" href="../connexion/deconnexion.php">Déconnexion</a>
                </div>
            </nav>
        <section>
            <div class="project-id">
                <h1>Projet: <?php echo htmlspecialchars($row["titre"]); ?></h1>
                <h2>ID du Projet: <?php echo htmlspecialchars($id_trace); ?></h2>
            </div>
            <div class="projects-container">
                <div class="project-card">
                    <div class="project-image">
                        <?php
                        $fichier = $row["fichier"];
                        if (file_exists($fichier) && is_file($fichier)) {
                            $info = getimagesize($fichier);
                            if ($info !== false) {
                                echo "<img src='".htmlspecialchars($fichier)."' alt='Image du projet' >";
                            } else {
                                echo "<a href='".htmlspecialchars($fichier)."'>Télécharger le fichier</a>";
                            }
                        } else {
                            echo "Fichier non trouvé.";
                        }
                        ?>
                    </div>
                    <div class="project-details">
                        <p><strong>Type:</strong> <?php echo htmlspecialchars($row["id_type"]); ?></p>
                        <p><strong>Année de BUT:</strong> <?php echo htmlspecialchars($row["annee_but"]); ?></p>
                        <p><strong>Compétence :</strong> <?php echo htmlspecialchars($row["competence"] ?? ''); ?></p>
                        <pclass="description"><strong>Argumentaire:</strong> <?php echo htmlspecialchars($row["argumentaire"]); ?></p>
                        <p><strong>Date:</strong> <?php echo htmlspecialchars($row["date"]); ?></p>
                        <p><strong>Fichier:</strong>

                        </p>
                    </div>
                </div>
        </div>  

    </section>
    <section>
            <?php if ($role === 'Concepteur' || $role === 'Évaluateur'): ?>
                <div class="comments-section">
                    <h4>Commentaires</h4>
                    <div id="comments-container">
                        <!-- Les commentaires seront chargés ici dynamiquement -->
                        <?php $_GET['id_trace']=$id_trace;include 'afficher_commentaires.php'; ?>
                    </div>

                    <form action="submit_comment.php" method="post" class="comment-form">
                        <input type="hidden" name="id_trace" value="<?php echo $id_trace; ?>">
                        <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur']; ?>">
                        <textarea id="commentaire" name="commentaire" required></textarea>
                        <button type="submit">Poster le commentaire</button>
                    </form>
                </div>
            <?php endif; ?>
        </section>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun projet trouvé avec cet ID.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID de projet non fourni.";
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_trace = isset($_POST['id_trace']) ? $_POST['id_trace'] : null;

    if ($id_trace) {
        $sql = "SELECT * FROM traces WHERE id_trace = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_trace);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <title>Projet - <?php echo htmlspecialchars($row["numero_immatriculation"]); ?></title>
            </head>
            <body>
                <h1>Projet: <?php echo htmlspecialchars($row["titre"]); ?></h1>
                <p><strong>Type:</strong> <?php echo htmlspecialchars($row["id_type"]); ?></p>
                <p><strong>Année de BUT:</strong> <?php echo htmlspecialchars($row["annee_but"]); ?></p>
                 <p><strong>Compétence :</strong> <?php echo htmlspecialchars($row["competence"]); ?></p>
                <p><strong>Argumentaire:</strong> <?php echo htmlspecialchars($row["argumentaire"]); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($row["date"]); ?></p>
                <p><strong>Fichier:</strong>
                    <?php
                    $fichier = $row["fichier"];
                    if (file_exists($fichier) && is_file($fichier)) {
                        $info = getimagesize($fichier);
                        if ($info !== false) {
                            echo "<img src='".htmlspecialchars($fichier)."' alt='Image du projet' style='max-width: 300px;'>";
                        } else {
                            echo "<a href='".htmlspecialchars($fichier)."'>Télécharger le fichier</a>";
                        }
                    } else {
                        echo "Fichier non trouvé.";
                    }
                    ?>
                </p>
            </body>
            </html>
            <?php
        } else {
            echo "Aucun projet trouvé avec cet ID.";
        }

        $stmt->close();
    } else {
        echo "ID de projet non fourni.";
    }
>>>>>>> theirs
}

$conn->close();
?>
