<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  * {
    margin: 0;
    padding: 0; 
    box-sizing: border-box;
  }
  .main {
    display: flex; 
    justify-content: center; 
    align-items: center; 
    padding: 7% 0 4% 0;
  }
  .product-main-info {
    display: flex;
    width: 95%;
    justify-content: center;
    align-items: center; 
  }
  .product-main-info-container {
    display: flex; 
    flex-direction: column;
    width: 73rem;
  }
  .notifi {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    height: 70px; 
    background-color: #F5F5F5;
    margin-bottom: 50px;
    border-top: 3px solid rgb(201,0,0);
    padding: 0px 30px 0px 25px;
  }
  .view-cart-btn {
    background-color: rgb(201,0,0);
    padding: 12px 14px 12px 14px;
    color: white;
    border-radius: 50px;
    transition: 0.5s;
    border: 2px solid rgb(201,0,0);
    text-decoration: none;
  }
  .view-cart-btn:hover {
    background-color: white; 
    color: rgb(201,0,0);
  }
  .product-main-info-wrapper {
    display: flex;
    justify-content: center;
    width: 100%;
    flex-wrap: wrap;
  }
  .product-image {
    width: 583px; 
  }
  .product-image-wrapper {
    display: flex;
    width: 530px;
    height: 530px;
    justify-content: center;
    align-items: center;
  }
  .product-image-wrapper img {
    width: 100%;
    height: 100%;
  }
  .product-main-info-content {
    display: flex;
    flex-direction: column;
    width: 583px; 
  }
  .product-main-info-content-top {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }
  .content-top-part {
    margin-bottom: 25px;
  }
  .product-price-range {
    font-family: 'Graviola Soft W01';
    color: rgb(202,0,0);
  }
  .product-intro-txt {
    line-height: 1.6;
    color: #5F5E5E;
    font-size: 17px;
  }
  .product-main-info-content-bottom {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    height: 100px;
    border-top: 1px dotted gray;
  }
  .product-main-info-content-bottom p {
    color: #5F5E5E;
    font-size: 15px;
    font-family: 'Graviola Soft W01';
    margin-bottom: 8px;
  }
  .product-attrs {
    display: flex;
    flex-direction: column;
    height: 100px;
  }
  .product-attr {
    display: flex; 
    justify-content: space-between;
    align-items: center;
    width: 80%;
    flex: 1 0 0px; 
  }
  .product-attr-txt { 
    font-size: 15px;
    font-family: 'Graviola Soft W01';
    color: rgb(63, 63, 63);
  }
  .product-attr-options {
    width: 70%;
    height: 80%;
    padding: 0px 8px 0px 8px;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    border: none;
    background-color: #f1f1f1;
  }
  #product-final-price-wrapper {
     display: flex; 
     align-items: center;
     transition: 0.4s;
  }
  #product-final-price {
    font-family: 'Graviola Soft W01';
    color: rgb(201,0,0);
  }
  .last-options {
    display: flex;
    width: 42%;
    height: 52px;
    justify-content: space-between;
  }
  .product-quantity {
    display: flex;
  }
  .product-quantity-wrapper {
    display: flex;
    align-items: center;
    padding-left: 14px;
    width: 70px;
    background-color: #f1f1f1;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    border: none;
  }
  #add-cart-btn {
    opacity: 0.3;
    width: 58%;
    border: none;
    border-radius: 50px;
    background-color: rgb(202, 0, 0);
    color: white;
    font-size: 12px;
    font-family: 'Graviola Soft W01';
  }
</style>
<main class="main">
  <div class="product-main-info">
    <div class="product-main-info-container">
      <?php 
        if(isset($_GET["add"]) && !empty(trim((Int)$_GET["add"]))): ?>
          <div class="notifi">
            <p class="notifi-txt">"<?= $product_name ?>" đã được thêm vào giỏ hàng</p>
            <a class="view-cart-btn" href="../Cart/cart.php">Xem giỏ hàng</a>
          </div>
      <?php endif ?>
      <div class="product-main-info-wrapper">
        <div class="product-image">
          <div class="product-image-wrapper">
            <img src="<?= $image ?>">
          </div>
        </div>
        <div class="product-main-info-content">
          <form class="product-main-info-content-top" action="../Cart/cart_process.php?id=<?= $product_id ?>&action=add" method="POST">
            <h3 class="product-price-range content-top-part"><?= number_format($min_price) ?>đ - <?= number_format($max_price) ?>đ</h3>
            <p class="product-intro-txt content-top-part"></p>
            <div class="product-attrs content-top-part">
              <?php
                $attr_num = 1;
                foreach($addons as $addon): ?>
                  <div class="product-attr">
                    <label class="product-attr-txt" for="attrs<?= $attr_num?>"><?= $addon['addon_name'] ?></label>
                    <select class="product-attr-options" name="attrs<?= $attr_num?>" onchange="getTotalPrice(<?= $min_price?>);">
                      <option selected value="">Chọn loại</option>
                      <?php
                        foreach($addon['addon_values'] as $addon_val_id => $addon_val): ?>
                          <option value="<?= $addon_val_id.'-'.$addon_val['addon_value_price'].'-'.$addon_val['addon_value_name'] ?>"><?= $addon_val['addon_value_name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
              <?php 
                $attr_num++;
                endforeach ?>
              <script type="text/javascript">
                const getTotalPrice = min => {
                  document.getElementById('product-final-price-wrapper').style.height = '50px';
                  let attrs_options = document.getElementsByClassName('product-attr-options'); 
                  let add_cart_btn = document.getElementById('add-cart-btn');
                  let total_price = min;
                  let attr_option = []; 
                  let count = 0;
                  for(let i = 0; i < attrs_options.length; i++) {
                    if(attrs_options[i].selectedIndex > 0) {
                      attr_option = attrs_options[i].options[attrs_options[i].selectedIndex].value.split("-");
                      console.log(attr_option);
                      total_price += Number(attr_option[1]);
                      count++;
                    }
                  }
                  document.getElementById('product-final-price').innerHTML = `${total_price}đ`;
                  add_cart_btn.disabled = count === attrs_options.length ? false : true;
                  add_cart_btn.style.opacity = count === attrs_options.length ? "1" : "0.3";
                }
              </script>
            </div>
            <div id="product-final-price-wrapper">
              <h3 id="product-final-price"></h3>
            </div>
            <div class="last-options content-top-part">
              <div class="product-quantity">
                <input class="product-quantity-wrapper" type="number" name="prod-qty" value="1" min="1">
              </div>
              <input id="add-cart-btn" disabled type="submit" value="ADD TO CART">
            </div>
          </form>
          <div class="product-main-info-content-bottom">
            <p>SKU: N/a</p>
            <p>Category: <?= $category_name ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>