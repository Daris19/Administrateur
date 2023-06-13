<?php 
session_start();
include('includes/header.php');

include('includes/navbar.php');
include('includes/topbar.php');
?>


 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Modifier un Administrateur
                            </h6>
                        </div>
                <div class="card-body">
                    <?php
                     $connection= mysqli_connect("localhost","root","","adminpanel");
                    if(isset($_POST['edit_btn'])){
                        $id = $_POST['edit_id'];
                    
                        $query = "SELECT * FROM register WHERE id='$id'";
                        $query_run=mysqli_query($connection,$query);

                        foreach($query_run as $row)
                        {
                         ?>


 <form action="code.php" method="POST">

 
    <input type="text" name="modifier_id" value="<?php echo $row['id'] ?>">                             
                <div class="form-group">
        <label> Username </label>
        <input type="text" name="modifier_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
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
    <a href="register.php" class="btn btn-danger"> Annuler </a>
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