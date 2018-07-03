<?php include "includes/db.php"; ?>


<?php

include "includes/header.php";

?>

<?php

include "includes/navigation.php";

?>


    <div class="container">

        <div class="row">


            <div class="col-md-8">


              <?php

                  if(isset($_POST['submit']))
                {
                  $search = $_POST['search'];
                  $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                  $search_query = mysqli_query($connection,$query);

                  if(!$search_query)
                  {
                    die("Query failed" . mysqli_error($connection));
                  }

                  $count = mysqli_num_rows($search_query);

                  if ($count == 0)
                  {
                    echo "<h1>NO RESULT</h1>";
                  }
                  else
                  {

                      $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                      $select_all_posts_query = mysqli_query($connection,$query);
                      while($row = mysqli_fetch_assoc($select_all_posts_query))
                      {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'],0,100);
                        $post_id = $row['post_id'];
                        ?>

                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                      <?php }}} ?>

            </div>


<?php

include "includes/sidebar.php";

 ?>

        </div>

        <hr>
<?php

include "includes/footer.php";

 ?>
