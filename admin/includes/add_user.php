<?php
  if(isset($_POST['create_user']))
  {
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];

$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    //
    // move_uploaded_file($post_image_temp,"../images/$post_image");
    //
    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";

    $create_user_query = mysqli_query($connection,$query);

    confirm($create_user_query);
    echo "User Created:" . " " . "<a href='users.php'>View Users</a>";
  }
 ?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" name="user_firstname" class="form-control">
  </div>

  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" name="user_lastname" class="form-control">
  </div>

  <div class="form-group">
    <select name="user_role" id="">
      <option value="subscriber">Select Options</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
    </div>


  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control">
  </div>


  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="user_email" class="form-control">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="user_password" class="form-control">
  </div>

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div> -->




  <div class="form-group">
  <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
  </div>


</form>
