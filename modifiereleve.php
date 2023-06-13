<?php 
session_start();
include('includes/header.php');

include('includes/navbar.php');
include('includes/topbar.php');
?>


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Modifier un Eleve
                            </h6>
                        </div>
                <div class="card-body">
                    <?php
                     $connection= mysqli_connect("localhost","root","","adminpanel");
                    if(isset($_POST['edit_btn'])){
                        $id = $_POST['edit_id'];
                    
                        $query = "SELECT * FROM eleve WHERE id='$id'";
                        $query_run=mysqli_query($connection,$query);

                        foreach($query_run as $row)
                        {
                         ?>


 <form action="eleve.php" method="POST">

 
    <input type="text" name="modifier_id" value="<?php echo $row['id'] ?>">                             
                <div class="form-group">
        <label> nom </label>
        <input type="text" name="modifier_nom" value="<?php echo $row['nom'] ?>" class="form-control" placeholder="Enter le nom">
    </div>
    <div class="form-group">
        <label> prenom</label>
        <input type="text" name="modifier_prenom" value="<?php echo $row['prenom'] ?>" class="form-control" placeholder="Enter le prenom">
    </div>
    <div class="form-group">
        <label> formation</label>
        <input type="text" name="modifier_formation" value="<?php echo $row['formation'] ?>" class="form-control" placeholder="Enter la formation">
    </div>
    <div class="form-group">
        <label> adresse</label>
        <input type="text" name="modifier_adresse" value="<?php echo $row['adresse'] ?>" class="form-control" placeholder="Enter l'adresse'">
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="modifier_email" value="<?php echo $row['email'] ?>" class="form-control checking_email" placeholder="Enter Email">
        <small class="error_email" style="color: red;"></small>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="modifier_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
    </div>
    <a href="eleves2.php" class="btn btn-danger"> Annuler </a>
     <button type="submit" name="modifierbtn" class="btn btn-primary">Mettre a jour</button>
     <form>
    <?php   
                        }
                    }
                    ?>  

                        </div>
                        </div>
                    </div>

               
    </div>
    <!-- End of Page Wrapper -->


    
    </div>
    <!-- End of Page Wrapper -->



<?php
     include('includes/footer.php');
    include('includes/scripts.php');
   
    ?>