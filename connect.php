<?php
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];
    //$status_utilisateur = $_POST['status_utilisateur'];

    //Databass connection
    $conn = new mysqli('localhost','root','','test2');

    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
        $stmt = $conn -> prepare("insert into utilisateur (nom_utilisateur,mot_de_passe)
        values(?,?)");
        $stmt -> bind_param("ss",$nom_utilisateur,$mot_de_passe);
        $stmt -> execute();
        $stmt -> store_result();
        echo "registration successfully...";
        $stmt -> close();
        $conn -> close();
    }
?>