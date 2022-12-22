<?php

$filename = "blog";

include "src/header.php"

?>

<div class="hero-wrap" style="background-image: url('images/bg_3.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
        <div class="text">
          <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
          <h1 class="mb-4 bread">Our Stories</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row d-flex">
      <?php

      require "src/database.php";

      $blogs = mysqli_query($conn, "SELECT post.id, post.image, post.title, user.fullname, post.created_at, post.content FROM post 
JOIN user ON post.uid = user.uid
WHERE post.draft = 'no'
ORDER BY post.created_at DESC");

      while ($post = mysqli_fetch_assoc($blogs)) {
        $date = date($post['created_at']);
      ?>

        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="javascript:void(0);" class="block-20 rounded" style="background-image: url('images/Blog/<?= $post['image'] ?>');">
            </a>
            <div class="text mt-3">
              <div class="meta mb-2">
                <div><a href="javascript:void(0);"><?= $date ?></a></div>
                <div><a href="javascript:void(0);"><?= $post['fullname'] ?></a></div>
              </div>
              <h3 class="heading"><a href="#"><?= $post['title'] ?></a>
              </h3>
              <p class="d-inline-block text-truncate" style="max-width: 200px;"><?= $post['content'] ?></p>
              <div class="meta mb-2">
                <a href="blog.php" class="btn btn-secondary rounded">More info</a>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>
</section>

<?php include "src/footer.php" ?>
<?php include "src/scripts.php" ?>