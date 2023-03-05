
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@500&display=swap" rel="stylesheet">
<meta charset="UTF-8">
<style>
  .delicious {
    display: flex; 
    align-items: center;
    width: 100%;
    height: 800px; 
    background-image: url(http://pizzahouse.themerex.net/wp-content/uploads/2016/08/bg_wood.jpg?id=1164) !important
  }
  .delicious-wrapper {
    width: 100%;
    height: 650px;
    display: flex; 
    flex-direction: column; 
  }
  .delicious-titles {
    display: flex;
    flex-direction: column;  
    flex: 1 0 0px;
    justify-content: space-around;
    align-items: center;
    padding: 30px 0px 30px 0px;
  }
  .delicious-title-above {
    color: yellow; 
    font-family: 'Dancing Script', cursive;;
    font-size: 20px; 
  }
  .delicious-title-under {
    color: white; 
    font-size: 40px;
  }
  .delicious-list {
    display: flex;
    flex: 5 0 0px;
    justify-content: space-between;
    align-items: center;
    padding: 0px 200px 0px 200px;
  }
  .delicious-card {
    display: flex; 
    flex-direction: column;
    width: 280px; 
    height: 100%;
    text-align: center;
  }
  .delicious-card-image {
    display: flex; 
    flex: 3 0 0px; 
    justify-content: center; 
    align-items: center;
  }
  .delicious-card-image img {
    width: 250px;
    height: 250px;
  }
  .delicious-card-content {
    display: flex; 
    flex-direction: column;
    flex: 2 0 0px;
  }
  .delicious-card-content-detail {
    display: flex; 
    flex: 2 0 0px; 
    flex-direction: column; 
    justify-content: space-between; 
    align-items: center;
  }
  .product-name {
    color: yellow; 
    font-size: 24px; 
  }
  .product-desc-wrapper {
    height: 50px; 
    overflow: hidden;
  }
  .product-desc {
    color: white; 
    font-size: 14px; 
  }
  .product-price {
    color: white; 
    font-size: 20px; 
  }
  .select-btn-wrapper {
    display: flex; 
    flex: 1 0 0px; 
    justify-content: center; 
    align-items: flex-end; 
  }
  .select-btn {
    border-radius: 50px;
    color: white;
    font-size: 13px;
    text-transform: uppercase;
    text-decoration: none;
    border: 2px solid rgb(202, 0, 0);
    background-color: rgb(202, 0, 0);
    padding: 14px 19px 14px 19px;
    transition: 0.3s;
  }
  .select-btn:hover {
    border: 2px solid white;
    background-color: transparent;
  }
</style>
<section class="delicious">
  <div class="delicious-wrapper">
    <div class="delicious-titles">
      <p class="delicious-title-above">Liên hệ Order ngay</p>
      <p class="delicious-title-under">Thực đơn Pizza ưa chuộng</p>
    </div>
    <div class="delicious-list">
      <?php 
        include "../config/dbconnect.php";
        $sql = "SELECT * FROM tbl_product LIMIT 3"; 
        if($mysqli_res = $mysqli->query($sql)): 
          if($mysqli_res->num_rows > 0):
            while($product = $mysqli_res->fetch_object()): ?>
              <div class="delicious-card">
                <div class="delicious-card-image">
                  <img src="<?= $product->image ?>">
                </div>
                <div class="delicious-card-content">
                  <div class="delicious-card-content-detail">
                    <p class="product-name"><?= $product->product_name ?></p>
                    <div class="product-desc-wrapper">
                      <p class="product-desc"><?= $product->descp ?><p>
                    </div>
                    <p class="product-price"><?= number_format($product->price) ?>đ</p>
                  </div>
                  <div class="select-btn-wrapper">  
                    <a href="../ProductDetail/product_detail.php?id=<?= $product->id ?>" class="select-btn">Xem chi tiết</a>
                  </div>
                </div>
              </div>
            <?php endwhile ?>
          <?php endif ?>
        <?php endif ?>
      <?php ?>
    </div>
  </div>
</section>
  
  