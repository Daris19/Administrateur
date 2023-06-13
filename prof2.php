<?php 
session_start();
include('includes/header.php');

include('includes/navbar.php');
include('includes/topbar.php');
?>
<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Professeur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un professeur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="codeprof2.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> nom </label>
                <input type="text" name="nom" class="form-control" placeholder="Enter le nom">
            </div>
            <div class="form-group">
                <label> prenom </label>
                <input type="text" name="nom" class="form-control" placeholder="Enter le nom">
            </div>
            <div class="form-group">
                <label for ="matiere"> matiere </label>
                <select name="matiere" id="matiere">
                <option value="francais">francais</option>
                <option value="Mathématique">Mathématique</option>
                <option value="Culture General">Culture General</option>
                <option value="CEJM">CEJM</option>
                <option value="Anglais">Anglais</option>
                <option value="Cyber Sécurite">Cyber Sécurite</option>
              
                </select>
              <style>
                label{
                  display: block;
                  margin: button 10px;
                  font-weight:bold;
                }
                select{
                  padding:5px;
                  font-size:16px;
                  width: 100%;
                }
              </style>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Ajouter</button>
        </div>
      </form>

    </div>
  </div>
</div>
    <div class="card-body">
<h4>Efectifes des Professeur<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">Ajouter un profeseur</button></h4>

    
            <div class=table-responsive>

            <?php
                $connection= mysqli_connect("localhost","root","","adminpanel");

                $query = "SELECT * FROM professeur";
                $query_run = mysqli_query($connection, $query);
            ?>

<table class="table"id="daratable" width="100" cellspacing="0">
  <thead>
    <tr>
     
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">matiere</th>
      <th scope="col">email</th>
  
  </thead>
  <tbody>
  <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                ?>
                             <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['nom']; ?></td>
                                <td><?php  echo $row['prenom']; ?></td>
                                <td><?php  echo $row['matiere']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                             
                            </tr>
                            <?php
                            }
                        }else{
                            echo "Aucun Enregistrement Trouvé";
                        }
                        ?>
  </tbody>
</table>
        

</body>
</html>
    <?php
     include('includes/footer.php');
    include('includes/scripts.php');
   
    ?>