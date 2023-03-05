<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  .banner {
    display: flex;
    flex-direction: column;
    height: 453px;
    min-height: 400px;
    background: transparent;
  }
  .banner-titles {
    display: flex;
    flex-grow: 1;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
    padding-bottom: 5%;
  }
  .banner-titles-wrapper {
    text-align: center;
  }
  .banner-titles-wrapper p {
    line-height: 2;
  }
  .banner-title-above {
    color: #fac122;
    font-size: 40px;
    font-family: 'Graviola Soft W01';
  }
  .banner-title-below {
    color: white; 
    font-size: 16px;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../javascript/parallax.min.js"></script>
<script src="../javascript/parallax.js"></script>
<div class="banner" data-parallax="scroll" data-image-src="http://pizzahouse.themerex.net/wp-content/uploads/2016/08/header_bg.jpg">
  <?php include "nav_header.php"; ?>
  <div class="banner-titles">
    <div class="banner-titles-wrapper">
    <?php 
      switch ($mvar) {
        case "1": {
          echo '<p class="banner-title-above">'.$product_name.'</p>';
          echo '<p class="banner-title-below">Home / Menu / '.$category_name.' / '.$product_name.'</p>';
          break;
        }
        case "2":
          echo '<p class="banner-title-above">All News</p>';
          echo '<p class="banner-title-below">Home / All News</p>';
          break;
        case "3": {
          echo '<p class="banner-title-above">Menu</p>';
          echo '<p class="banner-title-below">Home / Menu</p>';
          break;
        }
        case "4": {
          echo '<p class="banner-title-above">Cart</p>';
          echo '<p class="banner-title-below">Home / Cart</p>';
          break;
        }
        case "5": {
          echo '<p class="banner-title-above">Checkout</p>';
          echo '<p class="banner-title-below">Home / Checkout</p>';
          break;
        }
        case "6": {
          echo '<p class="banner-title-above">Profile</p>';
          echo '<p class="banner-title-below">Home / Profile</p>';
          break;
        }
        case "7": {
          echo '<p class="banner-title-above">'.$blog_title.'</p>';
          echo '<p class="banner-title-below">Home / News / '.$blog_title.'</p>';
          break;
        }
        default: {
          echo "Banner Title";
          break;
        }
      }
    ?>
    </div>
  </div>
</div>