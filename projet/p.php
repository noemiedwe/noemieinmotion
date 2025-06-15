<?php
include 'connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_immatriculation = $_POST['numero_immatriculation'];
    $type = $_POST['type'];
    $annee_but = $_POST['annee_but'];
    $argumentaire = $_POST['argumentaire'];

    $stmt = $conn->prepare("INSERT INTO Traces (numero_immatriculation, id_type, annee_but, argumentaire) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $numero_immatriculation, $type, $annee_but, $argumentaire);

    if ($stmt->execute()) {
        echo "Projet ajoutée avec succès!";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>