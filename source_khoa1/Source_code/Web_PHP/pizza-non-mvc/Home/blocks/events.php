<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@500&display=swap" rel="stylesheet">
<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  .events {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 800px;
    background-image: url('http://pizzahouse.themerex.net/wp-content/uploads/2016/08/bg_section.jpg?id=1191') !important;
    background-size: cover;
  }
  .events-wrapper {
    display: flex;
    flex-direction: column;
    width: 74rem;
    height: 75%;
  }
  .events-titles {
    display: flex;
    flex: 1 0 0px;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
  }
  .events-title-above {
    color: #548c1d;
    font-family: 'Dancing Script';
    font-size: 25px;
  }
  .events-title-below {
    color: #5F5E5E;
    font-family: 'Graviola Soft W01';
    font-size: 40px;
  }
  .events-list {
    display: flex;
    flex: 5 0 0px; 
    justify-content: space-around;
    align-items: center;
  }
  .event {
    display: flex;
    flex-direction: column;
    width: 365px; 
    height: 85%;
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
    text-decoration: none;
  }
</style>
<section class="events">
  <div class="events-wrapper">
    <div class="events-titles">
      <h4 class="events-title-above">Một vài tin tốt</h4>
      <h1 class="events-title-below">Bài viết mới</h1>
    </div>
    <div class="events-list">
    <?php 
      $sql = "SELECT * FROM tbl_news ORDER BY id DESC LIMIT 3";
      if($mysqli_res = $mysqli->query($sql)):
        if($mysqli_res->num_rows > 0): 
          while ($blog = $mysqli_res->fetch_object()): ?>
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
                <a href="../NewDetail/new_detail.php?id=<?= $blog->id ?>" >ĐỌC THÊM</a>
              </div>
            </div>
          <?php endwhile ?>
        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
</section>