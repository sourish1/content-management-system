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
              $per_page = 3;
              if(isset($_GET['page']))
              {
                $page = $_GET['page'];

              }
              else {
                $page = "";
              }

              if($page == "" || $page == 1)
              {
                $page_1 = 0;
              }
              else {
                $page_1 = ($page * $per_page) - $per_page;
              }

              if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')
              {
                $select_post_query = "SELECT * FROM posts";
              }else {
                $select_post_query = "SELECT * FROM posts WHERE post_status = 'published'";
              }

              $select_post_query = "SELECT * FROM posts";
              $find_query = mysqli_query($connection,$select_post_query);
              $count = mysqli_num_rows($find_query);
              if($count < 1)
              {
                echo "<h1 class='text-center'>NO POSTS</h1>";
              }
              else {


              $count = ceil($count/$per_page);


                // $query = $query = "SELECT * FROM posts WHERE post_status = 'published'";
                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin')
                {
                  $query = "SELECT * FROM posts LIMIT {$page_1}, $per_page";
                }else {
                  $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT {$page_1}, $per_page";
                }

                $select_all_posts_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_all_posts_query))
                {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_user'];
                  $post_date = $row['post_date'];
                  $post_image = $row['post_image'];
                  $post_content = substr($row['post_content'],0,100);
                  $post_status = $row['post_status'];


                  ?>

                  <h2>
                      <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                  </h2>
                  <p class="lead">
                      by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                  </p>
                  <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                  <hr>
                  <a href="post.php?p_id=<?php echo $post_id; ?>">
                  <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                  </a>
                  <hr>
                  <p><?php echo $post_content; ?></p>
                  <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                  <hr>



            <?php }} ?>

                <hr>


            </div>

<?php

include "includes/sidebar.php";

 ?>

        </div>


        <hr>
<ul class="pager">


    <?php

    for($i=1;$i<=$count;$i++)
    {
      if($i == $page)
      {
        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a><li>";
      }else
      {
        echo "<li><a href='index.php?page={$i}'>{$i}</a><li>";
      }

    }

     ?>



</ul>

<?php

include "includes/footer.php";

 ?>
