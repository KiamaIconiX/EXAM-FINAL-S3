<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
    <h2 class="mb-4">Login</h2>
    <form action="loginreq.php" method="post" class="mb-4">
        <?php if (isset($_GET['error'])) { ?>
            <p class="text-danger"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <div class="form-group">
            <label for="nom_utilisateur">Username:</label>
            <input type="text" class="form-control" id="username" name="nom_utilisateur" value="test" required>
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Password:</label>
            <input type="password" class="form-control" id="password" name="mot_de_passe" value="test01" required>
        </div>
        <!--<input type="status_utilisateur" id="status" name="status_utilisateur" value="0">-->
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="register.php" class="btn btn-secondary">Register now</a>

</body>
</html>
