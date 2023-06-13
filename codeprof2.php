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
        header('Location: prof2.php');  
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
                header('Location: prof2.php');
            }
            else 
            {
                $_SESSION['status'] = "Profil du prof creer";
                $_SESSION['status_code'] = "error";
                header('Location: prof2.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Le mot de passe et la confirmation du mot de passe ne correspondent pas";
            $_SESSION['status_code'] = "warning";
            header('Location: prof2.php');  
        }
    }

}