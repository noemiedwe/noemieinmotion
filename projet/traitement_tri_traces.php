<?php
session_start();
<<<<<<< ours
include '../connexion/connexionDB.php';
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

// Récupérez les critères de tri du formulaire
$type = isset($_POST['id_type']) ? $_POST['id_type'] : '';
$annee_but = isset($_POST['annee_but']) ? $_POST['annee_but'] : '';
$date_ajout = isset($_POST['date_ajout']) ? $_POST['date_ajout'] : '';
$apprentissage_critique = isset($_POST['apprentissage_critique']) ? $_POST['apprentissage_critique'] : '';
$competence_but = isset($_POST['competence_but']) ? $_POST['competence_but'] : '';

// Construisez la requête SQL pour récupérer les traces triées
<<<<<<< ours
$sql = "SELECT * FROM traces WHERE 1=1";
$params = [];
$types = '';

if (!empty($type)) {
    $sql .= " AND id_type = ?";
    $params[] = $type;
    $types .= 's';
}
if (!empty($annee_but)) {
    $sql .= " AND annee_but = ?";
    $params[] = $annee_but;
    $types .= 's';
}
if (!empty($date_ajout)) {
    $sql .= " AND date = ?";
    $params[] = $date_ajout;
    $types .= 's';
}
if (!empty($apprentissage_critique)) {
    $sql .= " AND apprentissage_critique = ?";
    $params[] = $apprentissage_critique;
    $types .= 's';
}
if (!empty($competence_but)) {
    $sql .= " AND competence = ?";
    $params[] = $competence_but;
    $types .= 's';
}

$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
=======
$sql = "SELECT * FROM Traces WHERE 1=1";

if (!empty($type)) {
    $sql .= " AND id_type = '" . $conn->real_escape_string($type) . "'";
}
if (!empty($annee_but)) {
    $sql .= " AND annee_but = '" . $conn->real_escape_string($annee_but) . "'";
}
if (!empty($date_ajout)) {
    $sql .= " AND date = '" . $conn->real_escape_string($date_ajout) . "'";
}
if (!empty($apprentissage_critique)) {
    $sql .= " AND apprentissage_critique = '" . $conn->real_escape_string($apprentissage_critique) . "'";
}
if (!empty($competence_but)) {
    $sql .= " AND competence = '" . $conn->real_escape_string($competence_but) . "'";
}

$result = $conn->query($sql);
>>>>>>> theirs
header("Location: portfolioacadémique.php");
exit;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats</title>
</head>
<body>
    <h1>Résultats</h1>
    <div class="projects-container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="project-card">';
                echo '<h3>' . htmlspecialchars($row['titre']) . '</h3>';
                echo '<p>Type: ' . htmlspecialchars($row['id_type']) . '</p>';
                echo '<p>Année de BUT: ' . htmlspecialchars($row['annee_but']) . '</p>';
                echo '<p>Date: ' . htmlspecialchars($row['date']) . '</p>';
                echo '<p>Compétence: ' . htmlspecialchars($row['competence']) . '</p>';
                echo '</div>';
            }
        } else {
            echo "Aucune trace trouvée.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
