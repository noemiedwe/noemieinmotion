<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="projet.css">
    <title>Commentaires</title>
</head>
<body>
    <?php
    session_start();
    setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');
<<<<<<< ours
    include '../connexion/connexionDB.php';
=======
    include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

    // Assurez-vous que l'utilisateur est connecté
    if (!isset($_SESSION['utilisateur'])) {
        $_SESSION['utilisateur'] = 'prenom';
    }

    // Vérifiez si l'ID du projet est spécifié dans l'URL
    if (!isset($_GET['id_trace'])) {
        die("ID du projet non spécifié.");
    }

    $id_trace = $_GET['id_trace'];

<<<<<<< ours
    $sql = "SELECT commentaires.*, utilisateurs.nom_utilisateur FROM commentaires JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id_utilisateur WHERE id_trace = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_trace);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die("Erreur lors de la récupération des commentaires: " . $conn->error);
    }
=======
    $sql = "SELECT * FROM traces WHERE id_trace = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_trace);
$stmt->execute();
$result = $stmt->get_result();
>>>>>>> theirs

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $trace = $result->fetch_assoc();
            echo '<div class="comment">';
<<<<<<< ours
            echo '<p class="comment-author">Utilisateur: ' . htmlspecialchars($row['nom_utilisateur']) . '</p>';
            $date = new DateTime($row['date_commentaire']);
            echo '<p class="comment-date">Date: ' . htmlspecialchars($date->format('d F Y')) . '</p>';
=======
            echo "ID de la trace: " . htmlspecialchars($trace['id_trace']) . "<br>";
            echo '<p class="comment-author">Utilisateur: ' . htmlspecialchars($row['utilisateur']) . '</p>';
            echo '<p class="comment-date">Date: ' . htmlspecialchars(strftime("%d %B %Y", strtotime($row['date_commentaire']))) . '</p>';
>>>>>>> theirs
            echo '<p class="comment-text">' . htmlspecialchars($row['commentaire']) . '</p>';
            echo '<a href="#" class="reply-link" onclick="toggleReplyForm(' . $row['id'] . ')">Répondre</a>';
            echo '<div id="reply-form-' . $row['id'] . '" class="reply-form" style="display: none;">';
            echo '<form action="reponse_commentaire.php" method="post">';
            echo '<input type="hidden" name="id_commentaire" value="' . $row['id'] . '">';
            echo '<input type="hidden" name="id_trace" value="' . $id_trace . '">';
            echo '<label for="utilisateur">Nom:</label>';
            echo '<input type="text" name="utilisateur" value="' . htmlspecialchars($_SESSION['utilisateur']) . '" readonly>';
            echo '<label for="reponse">Réponse:</label>';
            echo '<textarea name="reponse" required></textarea>';
            echo '<button type="submit">Poster la réponse</button>';
            echo '</form>';
            echo '</div>';

            // Afficher les réponses associées à ce commentaire
            $query = "SELECT * FROM reponses WHERE id_commentaire = ? ORDER BY date_reponse ASC";
            $stmt_reponses = $conn->prepare($query);
            $stmt_reponses->bind_param("i", $row['id']);
            $stmt_reponses->execute();
            $result_reponses = $stmt_reponses->get_result();

            if ($result_reponses->num_rows > 0) {
                while ($row_reponse = $result_reponses->fetch_assoc()) {
                    echo '<div class="reponse">';
                    echo '<p class="reponse-author">Utilisateur: ' . htmlspecialchars($row_reponse['utilisateur']) . '</p>';
<<<<<<< ours
                    $date = new DateTime($row['date_commentaire']);
                    echo '<p class="reponse-date">Date: ' . htmlspecialchars($date->format('d F Y')) . '</p>';
=======
                    echo '<p class="reponse-date">Date: ' . htmlspecialchars(strftime("%d %B %Y", strtotime($row_reponse['date_reponse']))) . '</p>';
>>>>>>> theirs
                    echo '<p class="reponse-text">' . htmlspecialchars($row_reponse['reponse']) . '</p>';
                    echo '</div>';
                }
            }

            echo '</div>';
        }
    } else {
        echo "Aucun commentaire trouvé pour ce projet.";
    }

    $stmt->close();
    $conn->close();
    ?>

    <script>
    function toggleReplyForm(commentId) {
        var replyForm = document.getElementById('reply-form-' + commentId);
        if (replyForm.style.display === 'none') {
            replyForm.style.display = 'block';
        } else {
            replyForm.style.display = 'none';
        }
    }
    </script>
</body>
</html>
