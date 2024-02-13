<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
    <h2 class="mb-4">Register</h2>
    <form action="connect.php" method="post" class="mb-4">
        <div class="form-group">
            <label for="nom_utilisateur">Username:</label>
            <input type="text" class="form-control" id="username" name="nom_utilisateur" required>
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Password:</label>
            <input type="password" class="form-control" id="password" name="mot_de_passe" required>
        </div>
        <!--<input type="status_utilisateur" id="status" name="status_utilisateur" value="0">-->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="login.php" class="btn btn-secondary">Login now</a>
</body>
</html>
