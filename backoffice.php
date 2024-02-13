<?php

// Connexion à la base de données (à remplacer par vos informations de connexion)
$servername = "localhost";
$username = "nom_utilisateur";
$id = "id_utilisteur";
$password = "mot_de_passe";
$status = "status_utilisateur";
$database = "nom_base_de_données";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Fonction pour récupérer la liste des variétés de thé depuis la base de données
function getVarietesDeThe($conn) {
    $sql = "SELECT * FROM varietes_de_the";
    $result = $conn->query($sql);
    $varietes = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $varietes[] = $row;
        }
    }
    return $varietes;
}

// Fonction pour ajouter une variété de thé dans la base de données
function ajouterVarieteDeThe($conn, $nom, $occupation, $rendement) {
    $sql = "INSERT INTO varietes_de_the (nom, occupation, rendement) VALUES ('$nom', '$occupation', '$rendement')";
    if ($conn->query($sql) === TRUE) {
        echo "Variété de thé ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la variété de thé : " . $conn->error;
    }
}

// Fonction pour récupérer la liste des parcelles de thé depuis la base de données
function getParcellesDeThe($conn) {
    $sql = "SELECT * FROM parcelles_de_the";
    $result = $conn->query($sql);
    $parcelles = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $parcelles[] = $row;
        }
    }
    return $parcelles;
}

// Fonction pour ajouter une parcelle de thé dans la base de données
function ajouterParcelleDeThe($conn, $numero, $surface, $id_variete) {
    $sql = "INSERT INTO parcelles_de_the (numero, surface, id_variete) VALUES ('$numero', '$surface', '$id_variete')";
    if ($conn->query($sql) === TRUE) {
        echo "Parcelle de thé ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la parcelle de thé : " . $conn->error;
    }
}

// Fonction pour récupérer la liste des cueilleurs depuis la base de données
function getCueilleurs($conn) {
    $sql = "SELECT * FROM cueilleurs";
    $result = $conn->query($sql);
    $cueilleurs = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $cueilleurs[] = $row;
        }
    }
    return $cueilleurs;
}

// Fonction pour ajouter un cueilleur dans la base de données
function ajouterCueilleur($conn, $nom, $genre, $date_naissance) {
    $sql = "INSERT INTO cueilleurs (nom, genre, date_naissance) VALUES ('$nom', '$genre', '$date_naissance')";
    if ($conn->query($sql) === TRUE) {
        echo "Cueilleur ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du cueilleur : " . $conn->error;
    }
}

// Fonction pour récupérer la liste des catégories de dépenses depuis la base de données
function getCategoriesDepenses($conn) {
    $sql = "SELECT * FROM categories_depenses";
    $result = $conn->query($sql);
    $categories = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
    return $categories;
}

// Fonction pour ajouter une catégorie de dépense dans la base de données
function ajouterCategorieDepense($conn, $nom) {
    $sql = "INSERT INTO categories_depenses (nom) VALUES ('$nom')";
    if ($conn->query($sql) === TRUE) {
        echo "Catégorie de dépense ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la catégorie de dépense : " . $conn->error;
    }
}

// Fonction pour récupérer la configuration du montant salaire par kg des cueilleurs depuis la base de données
function getConfigSalaireCueilleurs($conn) {
    $sql = "SELECT * FROM config_salaire_cueilleurs";
    $result = $conn->query($sql);
    $config = $result->fetch_assoc();
    return $config;
}

// Fonction pour mettre à jour la configuration du montant salaire par kg des cueilleurs dans la base de données
function updateConfigSalaireCueilleurs($conn, $montant) {
    $sql = "UPDATE config_salaire_cueilleurs SET montant = '$montant' WHERE id = 1";
    if ($conn->query($sql) === TRUE) {
        echo "Configuration du montant salaire par kg des cueilleurs mise à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de la configuration : " . $conn->error;
    }
}

// Exemple d'utilisation des fonctions pour gérer les fonctionnalités
// Ajout d'une variété de thé
ajouterVarieteDeThe($conn, "NomVariete", 1.8, 10);

// Ajout d'une parcelle de thé
ajouterParcelleDeThe($conn, "NumParcelle", 2.5, 1);

// Ajout d'un cueilleur
ajouterCueilleur($conn, "NomCueilleur", "Femme", "1990-01-01");

// Ajout d'une catégorie de dépense
ajouterCategorieDepense($conn, "Engrais");

// Mise à jour de la configuration du salaire des cueilleurs
updateConfigSalaireCueilleurs($conn, 10);

// Fermer la connexion à la base de données
$conn->close();
?>
