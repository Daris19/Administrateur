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
    <title>Administrateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un eleve</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="eleve.php" method="POST">

        <div class="modal-body">

        <div class="form-group">
                <label> Nom </label>
                <input type="text" name="nom" class="form-control" placeholder="Enter le nom">
            </div>
            <div class="form-group">
                <label> Prenom </label>
                <input type="text" name="prenom" class="form-control" placeholder="Enter le prenom">
            </div>
            <div class="form-group">
            <label for ="formation"> formation </label>
                <select name="formation" id="formation">
                <option value="BTS">BTS</option>
                <option value="DUT">DUT</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Licences">Licences</option>
                <option value="Master">Mster</option>
                <option value="Doctorat">Doctorat</option>
                </select>
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
                <label> Adresse </label>
                <input type="text" name="adresse" class="form-control" placeholder="Enter l'adresse">
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
<h4>Profil d'eleves<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">Ajouter un eleve</button></h4>

    
            <div class=table-responsive>

            <?php
                $connection= mysqli_connect("localhost","root","","adminpanel");

                $query = "SELECT * FROM eleve";
                $query_run = mysqli_query($connection, $query);
            ?>

<table class="table"id="daratable" width="100" cellspacing="0">
  <thead>
    <tr>
     
      <th scope="col">Id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">formation</th>
      <th scope="col">adresse</th>
      <th scope="col">Email</th>
      <th scope="col">password</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
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
                                <td><?php  echo $row['formation']; ?></td>
                                <td><?php  echo $row['adresse']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['password']; ?></td>
                                <td>
                                <form action="modifiereleve.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        
                                        <button type="submit" name="edit_btn" class="btn btn-outline-success">Modifier</button>
                                    </form>
                            </td>
                            <td>
                            <form action="eleve.php" method="post">
                            <input type="hidden" name="supprimer_id" value="<?php echo $row['id']; ?>">
                                    
                                    <button type="submit" name="supprimer_btn"class="btn btn-outline-danger">Suprimer</button>
                                    </form>
                                </td>
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