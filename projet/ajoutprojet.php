<?php
session_start();
<<<<<<< ours
include '../connexion/connexionDB.php';
=======
include 'C:/wamp/www/code/portfolio/connexion/connexionDB.php';
>>>>>>> theirs

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Concepteur') {
    header("Location: accueil.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_immatriculation = isset($_POST['numero_immatriculation']) ? $_POST['numero_immatriculation'] : null;
    $titre = isset($_POST['titre']) ? $_POST['titre'] : null;
    $type = isset($_POST['id_type']) ? $_POST['id_type'] : null;
    $annee_but = isset($_POST['annee_but']) ? $_POST['annee_but'] : null;
     $annee_but = isset($_POST['competence']) ? $_POST['competence'] : null;
    $argumentaire = isset($_POST['argumentaire']) ? $_POST['argumentaire'] : null;
    $dateprojet = isset($_POST['date']) ? $_POST['date'] : null;
    $id_utilisateur = $_SESSION['id_utilisateur'];

    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == UPLOAD_ERR_OK) {
        $fichier = $_FILES['fichier'];
        $nom_fichier = $fichier['name'];
        $chemin_temporaire = $fichier['tmp_name'];
        $chemin_destination = 'uploads/' . $nom_fichier;

        $dossier = 'uploads';
        if (!file_exists($dossier)) {
            if (!mkdir($dossier, 0755, true)) {
                die("Erreur: Impossible de créer le dossier '$dossier'.");
            }
        }

        if (!move_uploaded_file($chemin_temporaire, $chemin_destination)) {
            die("Erreur lors du téléchargement du fichier.");
        }
    } else {
        die("Aucun fichier téléchargé ou erreur lors du téléchargement.");
    }

    if ($numero_immatriculation && $type && $annee_but && $argumentaire && $dateprojet) {
<<<<<<< ours
        $stmt = $conn->prepare("INSERT INTO traces (numero_immatriculation, titre, id_type, id_utilisateur, annee_but, competence, argumentaire, date, fichier) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
=======
        $stmt = $conn->prepare("INSERT INTO Traces (numero_immatriculation, titre, id_type, id_utilisateur, annee_but, competence, argumentaire, date, fichier) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
>>>>>>> theirs
        $stmt->bind_param("sssssssss", $numero_immatriculation, $titre, $type, $id_utilisateur, $annee_but, $competence, $argumentaire, $dateprojet, $chemin_destination);

        if ($stmt->execute()) {
            $id_trace = $stmt->insert_id;

            $contenu_page = file_get_contents('projet.php');
<<<<<<< ours
            $contenu_page = str_replace('{id_trace}', htmlspecialchars($id_trace), $contenu_page);
=======
>>>>>>> theirs
            $contenu_page = str_replace('{numero_immatriculation}', htmlspecialchars($numero_immatriculation), $contenu_page);
            $contenu_page = str_replace('{titre}', htmlspecialchars($titre), $contenu_page);
            $contenu_page = str_replace('{id_type}', htmlspecialchars($type), $contenu_page);
            $contenu_page = str_replace('{annee_but}', htmlspecialchars($annee_but), $contenu_page);
            $contenu_page = str_replace('{competence}', htmlspecialchars($competence), $contenu_page);
            $contenu_page = str_replace('{argumentaire}', htmlspecialchars($argumentaire), $contenu_page);
            $contenu_page = str_replace('{date}', htmlspecialchars($dateprojet), $contenu_page);
            $contenu_page = str_replace('{fichier}', htmlspecialchars($chemin_destination), $contenu_page);

            $nom_fichier_page = 'projet_' . $id_trace . '.php';
<<<<<<< ours
            $chemin_fichier_page = '../projet/' . $nom_fichier_page;
=======
            $chemin_fichier_page = 'C:/wamp/www/code/portfolio/projet/' . $nom_fichier_page;
>>>>>>> theirs

            if (!file_put_contents($chemin_fichier_page, $contenu_page)) {
                die("Erreur: Impossible de créer la page du projet.");
            }

<<<<<<< ours
            header("Location: ../projet/portfolioacadémique.php");
=======
            header("Location: /code/portfolio/projet/portfolioacadémique.php");
>>>>>>> theirs
            exit();
        } else {
            echo "Erreur: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>