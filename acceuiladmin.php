<?php
include "db_conn.php";

session_start();
if ($_SESSION['status'] == 0) {
    echo "Not admin user!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Ajout de Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2 class="mb-4">Admin</h2>
    <form action="requestadmin.php" method="post" class="mb-4">
        <?php if (isset($_GET['error'])) { ?>
            <p class="text-danger"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        
        <!-- Form 1 -->
        <input type="hidden" name="form_num" value="1">

        <div class="form-group">
            <label for="nom_the_var">Nom variété de Thé:</label>
            <input type="text" class="form-control" id="nom_the_var" name="nom_the_var" required>
        </div>
        <div class="form-group">
            <label for="occupation">Occupation:</label>
            <input type="text" class="form-control" id="occupation" name="occupation" required>
        </div>
        <div class="form-group">
            <label for="rendement">Rendement:</label>
            <input type="text" class="form-control" id="rendement" name="rendement" required>
        </div>
        <button type="submit" class="btn btn-primary">Add The</button>
    </form>

    <form action="requestadmin.php" method="post">
        <!-- Form 2 -->
        <input type="hidden" name="form_num" value="2">

        <div class="form-group">
            <label for="num_parc">Numéro Parcelle</label>
            <input type="text" class="form-control" id="num_parc" name="num_parc" required>
        </div>
        <div class="form-group">
            <label for="surface_ha">surface en hectare,:</label>
            <input type="number" class="form-control" id="surface_ha" name="surface_ha" required>
        </div>
        <div class="form-group">
            <label for="var_the">variété de thé planté:</label>
            <input type="text" class="form-control" id="var_the" name="var_the" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Parcelle</button>
    </form>
</body>
</html>
