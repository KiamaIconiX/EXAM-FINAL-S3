<?php
include "db_conn.php";

session_start(); // Start the session

if (isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe'])) {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if (empty($nom_utilisateur)) {
        header("Location: login.php?error=Username is required");
        exit();
    } else if (empty($mot_de_passe)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM `utilisateur` WHERE nom_utilisateur = :nom_utilisateur AND mot_de_passe = :mot_de_passe";
        $stmt = $pdo->prepare($sql);

        if ($stmt) {
            $stmt->bindParam(':nom_utilisateur', $nom_utilisateur, PDO::PARAM_STR);
            $stmt->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $_SESSION['status'] = $user['status_utilisateur'];
                $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
                
                if ($user['id'] == 1) {
                    header("Location: acceuiladmin.php");
                } else {
                    header("Location: acceuiluser.php");
                }
                exit();
            } else {
                header("Location: login.php?error=Invalid username or password");
                exit();
            }

            $stmt = null;
        } else {
            header("Location: login.php?error=Database error");
            exit();
        }
    }
} else {
    header("Location: login.php?error");
    exit();
}

$pdo = null;
?>
