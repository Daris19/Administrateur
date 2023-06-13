
	<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" type="text/css" href="interface.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example">

    <!-- Example Code -->
    
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="container-fluid">

        <a class="navbar-brand" href="inter.php">Espace Professeur</a>     
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Cours <sup>+</sup></h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="inter.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="efectif.php">liste des eleves</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="moyenn.php">Moyenne</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="presence.php">liste de Presence</a>
              </li>
            </ul>
         
            <style>
        .google-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4285F4;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .google-link:hover {
            background-color: #3367D6;
        }
    </style>
</head>

    <a class="google-link" href="index.php" target="_blank">Se deconnecter</a>

          </div>
        </div>
      </div>
    </nav>
    
    <!-- End Example Code -->
 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Administrateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php 
session_start();
include('includes/header.php');


include('includes/topbar.php');
?>
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
<h4>Liste des eleves</h4>

    
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
