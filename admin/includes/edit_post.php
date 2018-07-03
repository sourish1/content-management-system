
<?php

if(isset($_GET['p_id']))
{
  $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_posts_by_id))
{
   $post_title = $row['post_title'];
   $post_id = $row['post_id'];
   $post_category_id = $row['post_category_id'];
   $post_status = $row['post_status'];
   $post_image = $row['post_image'];
   $post_comment_count = $row['post_comment_count'];
   $post_date = $row['post_date'];
   $post_tags = $row['post_tags'];
   $post_content = $row['post_content'];
   $post_user = $row['post_user'];
 }
?>
<?php
  if(isset($_POST['update_post']))
  {
    $post_title = $_POST['post_title'];
    $post_user = $_POST['post_user'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($post_image_temp,"../images/$post_image");

    if(empty($post_image))
    {
      $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
      $select_image = mysqli_query($connection,$query);

      while($row = mysqli_fetch_array($select_image))
      {
        $post_image = $row['post_image'];
      }
    }

    $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_date = now(), post_user = '{$post_user}', post_status = '{$post_status}', post_tags = '{$post_tags}', post_content = '{$post_content}', post_image = '{$post_image}' WHERE post_id = {$the_post_id}";
    $update_post = mysqli_query($connection,$query);
    confirm($update_post);
    echo "<p class='bg-success'>Post Updated <a href='../post.php?p_id={$the_post_id}'>View Post</a>   <a href='posts.php'>Edit More Posts<a></p>";
  }
 ?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
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
    <input value="<?php //echo $post_author; ?>" type="text" name="post_author" class="form-control">
  </div> -->

  <div class="form-group">
    <label for="users">Users</label>
    <br>
    <select name="post_user" id="">
      <?php
      $users_query = "SELECT * FROM users";
      $select_users = mysqli_query($connection,$users_query);
      echo "<option value='{$post_user}'>{$post_user}</option>"; 
       while($row = mysqli_fetch_assoc($select_users))
       {
         $user_id = $row['user_id'];
         $username = $row['username'];
         echo "<option value='{$username}'>{$username}</option>";
       }
       ?>
    </select>
  </div>

  <!-- <div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control">
  </div> -->

  <div class="form-group">
    <select name="post_status" id="">
    <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>

<?php

  if($post_status == 'published')
  {
    echo "<option value='draft'>draft</option>";
  }
  else
  {
    echo "<option value='published'>published</option>";
  }

 ?>

    </select>
  </div>


  <div class="form-group">
    <label for="post_image">Post Image</label>
    <br>
    <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="title">Post Content</label>
    <br>
    <textarea name="post_content" rows="10" cols="80"><?php echo $post_content; ?></textarea>
  </div>

  <div class="form-group">
  <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
  </div>


</form>
