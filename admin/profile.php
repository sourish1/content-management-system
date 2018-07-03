
<?php include "includes/admin_header.php"; ?>
<?php

if(isset($_SESSION['username']))
{
$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '{$username}'";
$select_user_profile = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_user_profile))
{
  $user_id = $row['user_id'];
  $username = $row['username'];
  $user_password = $row['user_password'];
  $user_firstname = $row['user_firstname'];
  $user_lastname = $row['user_lastname'];
  $user_email = $row['user_email'];
  $user_image = $row['user_image'];
}
}

 ?>

 <?php

 if(isset($_POST['edit_user']))
 {
   $username = $_POST['username'];
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $user_email = $_POST['user_email'];
   $user_password = $_POST['user_password'];

   $query = "UPDATE users SET username = '{$username}', user_password = '{$user_password}', user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_email = '{$user_email}' WHERE username = '{$username}'";
   $update_user = mysqli_query($connection,$query);
   confirm($update_user);
 }


  ?>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">
                          Welcome to Admin
                          <small><?php echo $_SESSION['username']; ?></small>
                      </h1>

                      <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="firstname">Firstname</label>
                          <input value="<?php echo $user_firstname; ?>" type="text" name="user_firstname" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="lastname">Lastname</label>
                          <input value="<?php echo $user_lastname; ?>" type="text" name="user_lastname" class="form-control">
                        </div>

                        <!-- <div class="form-group">
                          <select name="user_role" id="">

                            <option value="subscriber"><?php //echo $user_role; ?></option>
                            <?php

                            // if($user_role == 'admin')
                            // echo "<option value='subscriber'>Subscriber</option>";
                            // else
                            // {
                            //   echo "<option value='admin'>Admin</option>";
                            // }

                             ?>
                          </select>
                          </div> -->


                        <div class="form-group">
                          <label for="username">Username</label>
                          <input value="<?php echo $username; ?>" type="text" name="username" class="form-control">
                        </div>


                        <div class="form-group">
                          <label for="email">Email</label>
                          <input value="<?php echo $user_email; ?>" type="email" name="user_email" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="password">Password</label>
                          <input value="<?php echo $user_password; ?>" type="password" name="user_password" class="form-control">
                        </div>

                        <!-- <div class="form-group">
                          <label for="post_image">Post Image</label>
                          <input type="file" name="image">
                        </div> -->




                        <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>


                      </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
