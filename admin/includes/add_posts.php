<?php
  if(isset($_POST['create_post']))
  {
    $post_title = $_POST['post_title'];
    $post_user = $_POST['post_user'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_date = date('d-m-y');
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    // $post_comment_count = 4;


    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status) VALUES ('{$post_category_id}','{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    // $query .= "";

    $create_post_query = mysqli_query($connection,$query);

    confirm($create_post_query);
    $the_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-success'>Post Created <a href='../post.php?p_id={$the_post_id}'>View Post</a>   <a href='posts.php?source=add_posts'>Create More Posts<a></p>";
  }
 ?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="post_title" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_category">Post Category</label>
    <br>
    <select name="post_category_id" id="">
      <?php
      $query = "SELECT * FROM categories";
      $select_categories = mysqli_query($connection,$query);
       while($row = mysqli_fetch_assoc($select_categories))
       {
         $cat_title = $row['cat_title'];
         $cat_id = $row['cat_id'];
         echo "<option value='{$cat_id}'>{$cat_title}</option>";
       }
       ?>
    </select>
  </div>


  <!-- <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" name="post_author" class="form-control">
  </div> -->

  <div class="form-group">
    <label for="users">Users</label>
    <br>
    <select name="post_user" id="">
      <?php
      $users_query = "SELECT * FROM users";
      $select_users = mysqli_query($connection,$users_query);
       while($row = mysqli_fetch_assoc($select_users))
       {
         $user_id = $row['user_id'];
         $username = $row['username'];
         echo "<option value='{$username}'>{$username}</option>";
       }
       ?>
    </select>
  </div>

  <div class="form-group">
    <label for="post_status">Post Status:</label>
    <br>
    <select class="" name="post_status">
      <option value="draft">Select Options</option>
      <option value="draft">Draft</option>
      <option value="published">Publish</option>

    </select>
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">Post Content</label>
    <br>
    <textarea name="post_content" rows="10" cols="80"></textarea>
  </div>

  <div class="form-group">
  <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>


</form>
