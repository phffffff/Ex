<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  .body {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
  }
  .related-product {
    display: flex;
    width: 73rem;
    flex-direction: column;
    text-align: center;
  }
  .related-product h1 {
    font-size: 25px;
    height: 43px;
    font-family: 'Graviola Soft W01';
    font-weight: 800;
  }
  .list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    border-top: 1px dashed #e3e3e3;
  }
  .item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 5% 30px 7% 0px; 
  }
  .name-item {
    padding: 20px 0px 15px 0px;
    font-size: 1.2rem;
  }
  .name-item:hover {
    color: #CA0808;
    transition: 0.5s;
  }
  .price {
    color: #CA0808;
    padding-bottom: 1rem;
  }
  .btn {
    margin: 1rem;
  }
  .btn a {
    font-size: 0.9rem;
    text-decoration: none;
    border-radius: 50px;
    padding: 1rem 2rem 1rem 2rem;
    border: none;
    color: white;
    background-color: #CA0808;
  }
  .btn a:hover {
    border: #CA0808 solid 2px;
    background-color: white;
    color: #CA0808;
    transition: 0.5s;
  }
</style>
<div class="body">
  <div class="related-product">
    <h1>Thực đơn liên quan</h1>
    <div class="list">
    <?php 
      $sql = 
      "SELECT 
        tbl_product.id AS product_id,
        product_name, 
        tbl_product.image, 
        price as min_price, 
        (price + (SELECT MAX(addon_price) FROM tbl_addon_values)) as max_price 
        FROM tbl_product, tbl_category WHERE tbl_product.category_id = tbl_category.id 
        AND category_name = ? AND tbl_product.id <> $product_id LIMIT 4";
      if($statement = $mysqli->prepare($sql)):
        $statement->bind_param("s", $name);
        $name = $category_name;
        if($statement->execute()):
          $mysqli_res = $statement->get_result();   
          if($mysqli_res->num_rows > 0):
            while($related_prod = $mysqli_res->fetch_object()): ?>
              <div class="item">
                <div class="img-item">
                  <a href="">
                    <img width="250" height="250" src="<?= $related_prod->image?>" alt="">
                  </a>
                </div>
                <div class="name-item">
                  <p><?= $related_prod->product_name?></p>
                </div>
                <div class="price"><?= number_format($related_prod->min_price)?><sup>đ</sup> - <?= number_format($related_prod->max_price)?><sup>đ</sup></div>
                <div class="btn"><a href="product_detail.php?id=<?= $related_prod->product_id ?>">Xem chi tiết</a></div>
              </div>
            <?php endwhile ?>
          <?php endif ?>
        <?php endif ?>
      <?php endif ?>
    </div>
  </div>
</div>