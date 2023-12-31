<?php
session_start();
include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">SE CONNECTER </h1>
<?php
$connection = mysqli_connect("localhost", "root", "", "adminpanel");

// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification de l'élève dans la base de données
    $query = "SELECT id FROM eleve WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // L'élève est authentifié avec succès
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        header("Location: note.php"); // Rediriger vers la page d'accès aux notes de l'élève
        exit();
    } else {
        $error_message = "Identifiant ou mot de passe incorrect.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion élève</title>
</head>
<body>
    <h1>Connexion élève</h1>
    <?php
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>
    <form method="post" action="">
      
        <input type="text" id="email" name="email"  class="form-control form-control-user" placeholder="Enter Email Address..."required><br><br>

        <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Password"required><br><br>

        <input type="submit" name="login" value="Se connecter">
    </form>
</body>
</html>
