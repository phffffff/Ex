<style>
  * {
  margin: 0; 
  padding: 0;
  box-sizing: border-box;
  }
  .main {
    display: flex;
    width: 100%; 
    justify-content: center; 
    padding: 3rem 0px 3rem 0px;
  }

  .news-container {
    width: 73rem; 
    background-color: white;
  }

  a {
    text-decoration: none;
  }

  .post-item {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
    padding: 80px 0px 30px 0px;
    font-size: 11px;
    border-bottom: 1px dashed #e3e3e3;
  }

  .post-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: baseline;
    padding: 3px 0px 0px 40px;
  }

  .post-title {
    font-size: 28px;
    font-weight: 700;
    font-family: 'Graviola Soft W01';
  }

  .post-in4 {
    font-size: 11px;
    color: #717272;
  }

  .post-detail {
    font-size: 16px;
    color: gray;
  }

  .like {
    color: #ca0808;
  }

  .btn-read {
    padding: 15px 30px;
    background-color: #ca0808;
    color: white;
    border-radius: 2.3em;
    border: 2px solid #ca0808;
    transition: 0.4s;
    font-family: 'Graviola Soft W01';
  }

  .btn-read:hover {
    background-color: white;
    color: #ca0808;
    border: 2px solid #ca0808;
  }
</style>
<?php if(session_id() === '') session_start(); ?>
<div style="width: 100%; height: 0;">
  <?php $mvar = "2"; require_once "../global/short_banner.php"?>
  <main class="main">
    <div class="news-container">
      <?php
        include "../config/dbconnect.php";
        $sql = "SELECT * FROM tbl_news";
        if($mysqli_res = $mysqli->query($sql)):
          if($mysqli_res->num_rows > 0):
            while($blog = $mysqli_res->fetch_object()): ?>
              <div class="post-item">
                <div class="post-img">
                  <img width="585" height="330" src="<?= $blog->image ?>">
                </div>
                <div class="post-content">
                  <h3 class="post-title"><?= $blog->title ?></h3>
                  <a href="#" class="post-in4"><?= $blog->date_post ?></a>
                  <p class="post-detail"><?= strlen($blog->content) > 100 ? substr($blog->content, 0, 600).'...' : $blog->content ?></p>
                  <a href="../NewDetail/new_detail.php?id=<?= $blog->id ?>" class="btn-read">READ MORE</a>
                </div>
              </div>
            <?php endwhile ?>
          <?php endif ?>
        <?php endif ?>
      <?php ?>
    </div>
  </main>
  <?php require_once("../global/footer.php"); ?>
</div>