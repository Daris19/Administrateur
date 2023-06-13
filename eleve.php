<?php
session_start();
$connection= mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['registerbtn']))
{
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom']; 
    $formation = $_POST['formation']; 
    $adresse = $_POST['adresse']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM eleve WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Adresse e-mail déjà prise. Veuillez en essayer un autre..";
        $_SESSION['status_code'] = "error";
        header('Location: eleves2.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO eleve (nom,prenom,formation,adresse,email,password) VALUES ('$nom','$prenom','$formation','$adresse','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Profil de l'admin creer";
                $_SESSION['status_code'] = "success";
                header('Location: eleves2.php');
            }
            else 
            {
                $_SESSION['status'] = "Profil de l'admin creer";
                $_SESSION['status_code'] = "error";
                header('Location: eleves2.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Le mot de passe et la confirmation du mot de passe ne correspondent pas";
            $_SESSION['status_code'] = "warning";
            header('Location: eleves2.php');  
        }
    }

}


if(isset($_POST['modifierbtn']))

    $id = $_POST['modifier_id'];
    $nom = $_POST['modifier_nom'];
    $prenom = $_POST['modifier_prenom'];
    $formation = $_POST['modifier_formation'];
    $adresse = $_POST['modifier_adresse'];
    $email = $_POST['modifier_email'];
    $password = $_POST['modifier_password'];

    $query = "UPDATE eleve SET nom='$nom', prenom='$prenom',formation='$formation',adresse='$adresse',email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run)
{
    $_SESSION['status'] = "Eleve modifier";
  
    header('Location: eleves2.php'); 
}
else
{
    $_SESSION['status'] = "Eleve modifier";
  
    header('Location: eleves2.php'); 
} 


if(isset($_POST['supprimer_btn']))
{
    $id = $_POST['supprimer_id'];

    $query = "DELETE FROM eleve WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Administrateur supprimer";
        $_SESSION['status_code'] = "success";
        header('Location: eleves2.php'); 
    }
    else
    {
        $_SESSION['status'] = "Administrateur n'est pas suprimer";       
        $_SESSION['status_code'] = "error";
        header('Location: eleves2.php'); 
    }    
}
