<?php
session_start();
$connection= mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['registerbtn']))
{
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom'];
    $matiere = $_POST['matiere'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM professeur WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Adresse e-mail déjà prise. Veuillez en essayer un autre..";
        $_SESSION['status_code'] = "error";
        header('Location: prof.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO professeur (nom,prenom,matiere,email,password) VALUES ('$nom','$prenom','$matiere','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Profil du Prof creer";
                $_SESSION['status_code'] = "success";
                header('Location: prof.php');
            }
            else 
            {
                $_SESSION['status'] = "Profil du prof creer";
                $_SESSION['status_code'] = "error";
                header('Location: prof.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Le mot de passe et la confirmation du mot de passe ne correspondent pas";
            $_SESSION['status_code'] = "warning";
            header('Location: prof.php');  
        }
    }

}


if(isset($_POST['modifierbtn']))

    $id = $_POST['modifier_id'];
    $nom = $_POST['modifier_nom'];
    $prenom = $_POST['modifier_prenom'];
    $matiere = $_POST['modifier_matiere'];
    $email = $_POST['modifier_email'];
    $password = $_POST['modifier_password'];

    $query = "UPDATE professeur SET nom='$nom',prenom='$prenom',matiere='$matiere', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run)
{
    $_SESSION['status'] = "Professeur modifier";
  
    header('Location: prof.php'); 
}
else
{
    $_SESSION['status'] = "Professeur modifier";
  
    header('Location: prof.php'); 
} 




if(isset($_POST['supprimer_btn'])) {
    $id = $_POST['supprimer_id'];

    // Utilisez des requêtes préparées pour éviter les injections SQL
    $query = "DELETE FROM professeur WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $query_run = mysqli_stmt_execute($stmt);

    if($query_run) {
        $_SESSION['status'] = "Professeur supprimé";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Le professeur n'a pas pu être supprimé";
        $_SESSION['status_code'] = "error";
    }

    header('Location: prof.php');
    exit(); // Assurez-vous de terminer l'exécution du script après la redirection
}


if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM professeur WHERE email='$email_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email_login;
        header('Location: page.php');
   } 
   else
   {
        $_SESSION['status'] = "Email ou Password est incorecte";
        header('Location: login.php');
   }
    
}
?>