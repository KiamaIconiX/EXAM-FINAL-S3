<?php

    if($_POST['form_num']== 1){

    $nom_the_var = $_POST['nom_the_var'];
    $occupation = $_POST['occupation'];
    $rendement = $_POST['rendement'];

    //Databass connection
    $conn = new mysqli('localhost','root','','test');

    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
        $stmt = $conn -> prepare("insert into the_var (nom_the_var,occupation,rendement)
        values(?,?,?)");
        $stmt -> bind_param("sss",$nom_the_var,$occupation,$rendement);
        $stmt -> execute();
        $stmt -> store_result();
        header("Location: acceuiladmin.php");

        $stmt -> close();
        $conn -> close();
    }

    }

    if($_POST['form_num']== 2){

        $num_parc = $_POST['num_parc'];
        $surface_ha = $_POST['surface_ha'];
        $var_the = $_POST['var_the'];
    
        //Databass connection
        $conn = new mysqli('localhost','root','','test');
    
        if($conn->connect_error){
            die('Connection Failed :'.$conn->connect_error);
        }
        else{
            $stmt = $conn -> prepare("insert into parcelle (num_parc,surface_ha,var_the)
            values(?,?,?)");
            $stmt -> bind_param("iis",$num_parc,$surface_ha,$var_the);
            $stmt -> execute();
            $stmt -> store_result();
            header("Location: acceuiladmin.php");
    
            $stmt -> close();
            $conn -> close();
        }
    
        }


?>
