<?php
session_start();
<<<<<<< ours
include '../connexion/connexionDB.php';
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

if (!isset($_GET['id'])) {
    die("ID de trace non spécifié.");
}

$id_trace = $_GET['id'];

$sql = "DELETE FROM traces WHERE id_trace = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_trace);

if ($stmt->execute()) {
    echo "Trace supprimée avec succès.";
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
<<<<<<< ours
header("Location: ../projet/portfolioacadémique.php");
=======
header("Location: /code/portfolio/projet/portfolioacadémique.php");
>>>>>>> theirs
exit;
?>
