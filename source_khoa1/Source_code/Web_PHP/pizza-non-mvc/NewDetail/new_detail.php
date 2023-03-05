<?php if(session_id() === '') session_start(); ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@500&display=swap" rel="stylesheet">
<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');
  * {
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
  }
  a {
    text-decoration: none;
  }
  .main {
    display: flex; 
    width: 100%;
    justify-content: center; 
    align-items: center;
    padding: 100px 0px 100px 0px;
  }
  .new-area {
    display: flex; 
    width: 92%;
    justify-content: center; 
    align-items: center;
  }
  .new-wrapper {
    display: flex; 
    width: 73rem; 
    height: 100%;
  }
  .right {
    display: flex;
    flex-direction: column;
    flex: 4 0 0px; 
  }
  .left {
    display: flex;
    flex-direction: column;
    justify-content: center; 
    align-items: center;
    flex: 9 0 0px; 
  }
  .new-content {
    width: 92%;
  }
  .new-content-part {
    margin-bottom: 20px;
  }
  .new-image {
    width: 100%;
    height: 400px;
  }
  .new-text {
    line-height: 1.5;
    font-family: 'Poppins';
    font-size: 13px;
  }
  .another-news {
    display: flex; 
    flex-direction: column;
    padding: 30px 0px 30px 0px;
  }
  .another-news h3 {
    font-family: 'Poppins';
  }
  .another-news-list {
    display: flex; 
    justify-content: space-between;
    padding: 30px 0px 30px 0px;
  }
  .event {
    display: flex;
    flex-direction: column;
    width: 350px; 
    height: 400px;
    background-color: white;
    box-shadow: 0px 5px 6px rgb(238, 229, 229);
  }
  .event-image {
    flex: 2 0 0px;
    position: relative;
  }
  .event-image .event-img {
    width: 100%;
    height: 100%;
    transition: 0.4s;
  }
  .item-ic-link-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    transition: 0.4s;
  }
  .item-ic-link {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute; 
    transition: 0.2s;
  }
  .item-ic-link img {
    width: 0;
    height: 0;
  }
  .event-image:hover .item-ic-link {
    transform: scale(8, 8);
    border-radius: 200px;
    top: 48%; 
    left: 48%;
    width: 10px;
    height: 10px;  
    background-color: rgb(202,0,0);
  }
  .event-image:hover .item-ic-link-wrapper {
    width: 100%;
    height: 100%;
    background-color: rgb(0,0,0,0.5);
  }
  .event-image:hover .item-ic-link img {
    width: 4px;
    height: 4px;
  }
  .event-info {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    text-align: center;
    flex: 3 0 0px; 
    padding: 30px 20px 30px 20px;
  }
  .event-info p {
    width: 58%;
    padding: 3px 0px 3px 0px;
    background-color: #548c1d;
    border-radius: 3px;
    color: white;
    font-size: 14px;
  }
  .event-info h2 {
    font-size: 23px;
    font-family: 'Graviola Soft W01';
    color: #303030;
  }
  .event-info a {
    font-family: 'Graviola Soft W01';
    font-size: 12px;
    color: #548c1d;
  }
  .left-part {
    background-color: #F5F5F5;
    padding: 15% 15% 18% 15%;
    border-bottom: 2px solid #E4E4E4;
  }
  .left-part h1 {
    font-size: 20px;
    font-weight: 700;
    font-family: 'Graviola Soft W01';
    padding-bottom: 10%;
  } 
  .list-new {
    padding: 0px 0px 0px 17px;
  }
  .list-new li {
    color: #CA0808;
    padding: 7px 10px 10px 10px;
  }
  .left-part-link {
    color: #2b2b2b;
    display: block;
    float: left;
    font-size: 0.75em;
    letter-spacing: 3px;
    border-radius: 2px;
    font-weight: 300;
    margin: 5px;
  }
</style>
<div style="width: 100%; height: 0;">
  <?php 
    if(isset($_GET['id']) && !empty(trim($_GET['id']))) {
      $blog_id = (Int)(trim($_GET['id']));
      if(is_int($blog_id)) {
        $blog_image = $blog_title = $blog_content = $blog_date_post = '';
        include "../config/dbconnect.php";
        $sql = "SELECT image, title, date_post, content FROM tbl_news WHERE id=?";
        if($statement = $mysqli->prepare($sql)) {
          $statement->bind_param("i", $id_param);
          $id_param = $blog_id;
          if($statement->execute()) {
            $mysqli_res = $statement->get_result();
            if($mysqli_res->num_rows > 0) {
              $blog = $mysqli_res->fetch_object();
              $blog_image = $blog->image; 
              $blog_title = $blog->title; 
              $blog_content = $blog->content; 
              $blog_date_post = $blog->date_post;
            }
            $statement->close();
          }
        }
      }
    }
    $mvar = "7"; 
    require_once "../global/short_banner.php"; 
  ?>
  <main class="main">
    <div class="new-area">
      <div class="new-wrapper">
        <div class="left">
          <div class="new-content">
            <img class="new-image new-content-part" src="<?= $blog_image ?>">
            <h4 class="new-content-part"><?= $blog_date_post ?></h4>
            <p class="new-text new-content-part"><?= $blog_content ?></p>
            <div class="another-news">
              <h3>Có thể bạn quan tâm</h3>
              <div class="another-news-list">
              <?php 
                $sql = "SELECT id, image, date_post, title FROM tbl_news WHERE id <> ? ORDER BY id DESC LIMIT 2";
                if($statement = $mysqli->prepare($sql)): 
                  $statement->bind_param("i", $blog_id_param);
                  $blog_id_param = $blog_id;
                  if($statement->execute()):
                    $mysqli_res = $statement->get_result();
                    if($mysqli_res->num_rows > 0):
                      while($blog = $mysqli_res->fetch_object()): ?>
                        <div class="event">
                          <div class="event-image">
                            <a href="../NewDetail/new_detail.php?id=<?= $blog->id ?>">
                              <img class="event-img" src="<?= $blog->image ?>">
                              <div class="item-ic-link-wrapper">
                                <div class="item-ic-link">
                                  <img src="https://scontent.fhan3-2.fna.fbcdn.net/v/t1.15752-9/259356616_689097708703118_2836089214408038837_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_ohc=S2yGYBsDhasAX-b2KsF&_nc_ht=scontent.fhan3-2.fna&oh=4dd103664df23d55757974499e384eab&oe=61C9F557">
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="event-info">
                            <p><?= $blog->date_post ?></p>
                            <h2><?= $blog->title ?></h2>
                            <a href="../NewDetail/new_detail.php?id=<?= $blog->id ?>">READ MORE</a>
                          </div>
                        </div>
                      <?php endwhile ?>
                    <?php endif ?>
                  <?php endif ?>
                <?php endif ?>
                <?php $statement->close(); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="left-part">
            <h1>BÀI VIẾT KHÁC</h1>
            <ul class="list-new">
            <?php 
              $sql = "SELECT id, title FROM tbl_news WHERE id <> ? ORDER BY id DESC";
              if($statement = $mysqli->prepare($sql)):
                $statement->bind_param("i", $blog_id_param);
                $blog_id_param = $blog_id; 
                if($statement->execute()):
                  $mysqli_res = $statement->get_result();
                  if($mysqli_res->num_rows > 0):
                    while($blog = $mysqli_res->fetch_object()): ?>
                      <li><a class="left-part-link" href="new_detail.php?id=<?= $blog->id ?>"><?= $blog->title ?></a></li>
                    <?php endwhile ?>
                  <?php endif ?>
                <?php endif ?>
              <?php endif ?>
              <?php $mysqli->close(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php require_once("../global/footer.php"); ?>
</div>