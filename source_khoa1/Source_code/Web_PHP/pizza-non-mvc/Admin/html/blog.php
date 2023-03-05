<?php require_once 'header.php' ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="d-flex justify-content-end pb-3">
      <a href="add-blog.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
        <i class="zmdi zmdi-plus"></i>Thêm bài viết</a>
    </div>
    <div class="row">
    <?php 
      require_once("../../config/dbconnect.php");
      $sql = "SELECT * FROM tbl_news";
      if($mysqli_res = $mysqli->query($sql)):
        if($mysqli_res->num_rows > 0):
          while($blog = $mysqli_res->fetch_object()): ?>
            <div class="col-md-4">
              <div class="card">
                <img class="card-img-top" src="<?= $blog->image ?>" alt="Card image cap">
                <div class="card-body">
                  <h4 class="card-title mb-3"><?= $blog->title ?></h4>
                  <p class="card-text"><?= $blog->date_post ?></p>
                  <p class="card-text"><?= strlen($blog->content) > 75 ? substr($blog->content, 0, 125).'...' : $blog->content ?></p>
                  <a href="../handles/delete_blog.php?blog_id=<?= $blog->id ?>" class="float-right btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Xóa
                  </a>
                </div>
              </div>
            </div>
          <?php endwhile ?>
        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
</div>
<?php require_once 'footer.php' ?>