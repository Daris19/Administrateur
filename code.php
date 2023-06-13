<?php
session_start();
$connection= mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Adresse e-mail déjà prise. Veuillez en essayer un autre..";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Profil de l'admin creer";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Profil de l'admin creer";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Le mot de passe et la confirmation du mot de passe ne correspondent pas";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}


if(isset($_POST['modifierbtn']))

    $id = $_POST['modifier_id'];
    $username = $_POST['modifier_username'];
    $email = $_POST['modifier_email'];
    $password = $_POST['modifier_password'];

    $query = "UPDATE register SET username='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run)
{
    $_SESSION['status'] = "Administrateur modifier";
  
    header('Location: register.php'); 
}
else
{
    $_SESSION['status'] = "Administrateur modifier";
  
    header('Location: register.php'); 
} 





if(isset($_POST['supprimer_btn']))
{
    $id = $_POST['supprimer_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Administrateur supprimer";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Administrateur n'est pas suprimer";       
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }    
}
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
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
if(isset($_POST['login']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM professeur WHERE email='$email_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email_login;
        header('Location: efectif.php');
   } 
   else
   {
        $_SESSION['status'] = "Email ou Password est incorecte";
        header('Location: login.php');
   }
    
}

?>