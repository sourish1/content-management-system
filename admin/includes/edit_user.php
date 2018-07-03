<?php

if(isset($_GET['edit_user']))
{
  $the_user_id = $_GET['edit_user'];
}

  $query = "SELECT * FROM users WHERE user_id = $the_user_id";
  $select_users_query = mysqli_query($connection,$query);

   while($row = mysqli_fetch_assoc($select_users_query))
   {

     $username = $row['username'];
     $db_user_password = $row['user_password'];
     $user_firstname = $row['user_firstname'];
     $user_lastname = $row['user_lastname'];
     $user_email = $row['user_email'];
     $user_image = $row['user_image'];
     $user_role = $row['user_role'];

   }




  if(isset($_POST['edit_user']))
  {
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];

    // $query = "SELECT randSalt FROM users";
    // $select_randsalt_query = mysqli_query($connection,$query);
    // if(!$select_randsalt_query)
    // {
    //   die("Query Failed" . mysqli_error($connection));
    // }
    // $row = mysqli_fetch_array($select_randsalt_query);
    // $salt = $row['randSalt'];
    //
    //
    // $hashed_password = crypt($user_password,$salt);

    if($db_user_password !== $user_password)
{
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
}
    $query = "UPDATE users SET username = '{$username}', user_password = '{$user_password}', user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_email = '{$user_email}', user_role = '{$user_role}' WHERE user_id = $the_user_id";
    $update_user = mysqli_query($connection,$query);
    confirm($update_user);
  }

 ?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="firstname">Firstname</label>
    <input value="<?php echo $user_firstname; ?>" type="text" name="user_firstname" class="form-control">
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input value="<?php echo $user_lastname; ?>" type="text" name="user_lastname" class="form-control">
  </div>

  <div class="form-group">
    <select name="user_role" id="">

      <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
      <?php

      if($user_role == 'admin')
      echo "<option value='subscriber'>Subscriber</option>";
      else
      {
        echo "<option value='admin'>Admin</option>";
      }

       ?>
    </select>
    </div>


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
    <input value="<?php echo $db_user_password; ?>" type="password" name="user_password" class="form-control">
  </div>

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div> -->




  <div class="form-group">
  <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">
  </div>


</form>
