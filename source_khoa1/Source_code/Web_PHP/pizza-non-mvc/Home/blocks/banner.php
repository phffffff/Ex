<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  .banner {
    display: flex;
    flex-direction: column;
    height: 700px;
    min-height: 400px;
    background: transparent;
  }
  .banner-titles {
    display: flex;
    flex-grow: 1;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    background-color: rgba(0,0,0,0.4);
    padding: 14rem 0px 14rem 0px;
  }
  .banner-title-above {
    font-size: 30px;
    font-family: 'Dancing Script', cursive;
    color: rgb(255, 166, 0); 
    margin-top: 50px;
  }
  .banner-title-below {
    font-size: 60px; 
    font-weight: 700;
    font-family: 'Graviola Soft W01';
    color: white;
  }
  .banner-order-btn {
    font-size: 16px; 
    font-family: 'Graviola Soft W01';
    background-color: rgb(255, 166, 0);
    border: 2px solid rgb(255, 166, 0);
    border-radius: 10px;
    padding: 15px 30px 15px 30px;
    color: white;
    transition: 0.2s;
    text-decoration: none;
  }
  .banner-order-btn:hover {
    transform: scale(1.01, 1.01);
    background-color: transparent;
    border: 2px solid rgb(255, 166, 0);
    color: rgb(255, 166, 0);
  }
</style>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@500&display=swap" rel="stylesheet">
<div class="banner" data-parallax="scroll" data-image-src="https://c.wallhere.com/photos/ed/4c/pizza_food_mushroom_cheese_tomatoes-1845581.jpg!d">
  <?php require_once "../global/nav_header.php"; ?>
  <div class="banner-titles">
    <p class="banner-title-above">Authentic Italian Pizzas</p>
    <p class="banner-title-below">The Best Pizza in Town</p>
    <a href="../Menu/menu.php" class="banner-order-btn">Liên hệ order ngay</a>
  </div>
</div>