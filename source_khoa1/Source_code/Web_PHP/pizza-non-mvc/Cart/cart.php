<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<style>
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
    /* height: 55rem; */
    justify-content: center;
    align-items: center;
    padding: 120px 0px 110px 0px; 
  }
  .cart-area {
    display: flex; 
    width: 92%;
    height: 78%;
    justify-content: center; 
    align-items: center;
  }
  .cart-wrapper {
    display: flex;
    flex-direction: column; 
    justify-content: space-between;
    width: 73rem; 
    height: 100%;
  }
  .main table {
    width: 100%;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-collapse: collapse;
    text-align: center;
  }
  .cart-menu th {
    padding: 9px 0px;
    background-color: #ca0808;
    color: white;
  }
  .item {
    color: #717272;
  }
  .item td {
    padding: 12px 0px 12px 0px;
  }
  .img-pro img {
    width: 75px;
    height: 75px;
  }
  .name-pro a {
    color: #ca0808;
  }
  .name-pro a:hover {
    color: black;
  }
  .btn-del a {
    color: #ca0808;
  }
  .btn {
    border-top: 1px solid #f5f5f5;
  }
  .btn td {
    padding: 10px 0px;
    display: table-cell;
  }
  .product-quantity {
    display: flex;
    justify-content: center;
  }
  .product-quantity-wrapper {
    display: flex;
    align-items: center;
    padding: 13px 0px 13px 13px;
    width: 65px;
    background-color: #f1f1f1;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    border: none;
  }
  .product-quantity-controls {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }
  .qty-control-btn {
    width: 22px;
    height: 49%;
    border: none;
    border-radius: 0;
    background-color: rgb(202, 0, 0);
  }
  .coupon input {
    padding: 16px 13px;
    border: none;
    width: 10em;
    border-radius: 2.3em;
    background-color: #f5f5f5;
  }
  .apply button {
    border: 2px solid #ca0808;
    color: white;
    background-color: #ca0808;
    padding: 15px 26px;
    border-radius: 2.3em;
    font-size: 11px;
  }
  .apply button:hover {
    background-color: white;
    color: #ca0808;
    border-color: #ca0808;
  }
  .update input {
    border: none;
    color: white;
    background-color: #ca0808;
    padding: 15px 26px;
    border-radius: 2.3em;
    font-size: 11px;
  }
  .update input:hover {
    background-color: white;
    color: #ca0808;
    border: 2px solid #ca0808;
  }
  .icon {
    display: flex;
    align-items: center;
    flex-direction: column;
  }
  .icon p {
    padding-top: 40px;
    color: #ffffff;
  }
  .icon a {
    color: #fac122;
    text-decoration: none;
  }
  .remove {
    width: 100%;
    height: 40px;
  }
  .tong {
    width: 561px;
    display: flex;
    align-items: flex-end;
    padding: 0px 20px;
    border: 1px dotted rgba(0,0,0,.1);
    font-size: 16px;
  }
  .checkout {
    border: 2px solid #ca0808;
    color: white;
    background-color: #ca0808;
    border-radius: 2.3em;
    font-size: 11px;
    padding: 15px 25px 15px 25px;
    margin-top: 20px;
  }
  .checkout:hover {
    background-color: white;
    color: #ca0808;
    border: 2px solid #ca0808;
  }
  .total {
    display: flex; 
    height: 160px;
    flex-direction: column;
    justify-content: space-between;
    align-items: baseline;
    margin-top: 80px;
  }
</style>
<?php
  if(session_id() === '') session_start();
  $cart_items = isset($_SESSION['current_user']) ? (isset($_SESSION['current_user']['cart']) ? $_SESSION['current_user']['cart'] : []) : (isset($_SESSION['cart']) ? $_SESSION['cart'] : []);
?>
<div style="width: 100%; height: 0;">
  <?php 
    $mvar = "4";
    require_once "../global/short_banner.php";
  ?>
  <main class="main">
    <div class="cart-area">
      <div class="cart-wrapper">
        <form action="cart_process.php?action=update" method="POST">
          <table>
            <tr class="cart-menu">
              <th class="btn-del"></th>
              <th class="img-pro"></th>
              <th class="name-pro">Product</th>
              <th class="price">Price</th>
              <th class="sl">Quantity</th>
              <th class="subtotal">Subtotal</th>
            </tr>
        <?php 
          foreach($cart_items as $index => $cart_item): ?>  
            <tr class="item">
              <td class="btn-del"><a href="cart_process.php?idx=<?= $index ?>&action=delete">x</a></td>
              <td class="img-pro"><img src="<?= $cart_item["image"] ?>" alt=""></td>
              <td class="name-pro">
                <a href="#">
                  <?php 
                    echo $cart_item["product_name"]." - ";
                    $i = 0;
                    foreach($cart_item['addons'] as $addon_val) {
                      echo $addon_val[0];
                      if($i < count($cart_item['addons'])-1) echo ', ';
                      $i++;
                    }
                  ?>
                </a>
              </td>
              <td class="price"><?= number_format($cart_item["price"]) ?>đ</td>
              <td class="sl">
                <div class="product-quantity">
                  <input class="product-quantity-wrapper" name="<?= $index ?>" type="number" min="1" value="<?= $cart_item["qty_add"]?>">
                </div>
              </td>
              <td class="subtotal"><?= number_format($cart_item["price"] * $cart_item["qty_add"]) ?></td>
            </tr>
        <?php
          endforeach ?>
            <tr class="btn">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="update"><input type="<?= count($cart_items) > 0 ? 'submit' : 'hidden' ?>" value="UPDATE CART"></td>
            </tr>
          </table>
        </form>
        <div class="total">
          <h2>Tổng thanh toán</h2>
          <br>
          <div class="tong">
            <b style="padding: 6px 93px 6px 40px;">Total</b>
            <p>
              <?php 
                $total_price = 0; 
                foreach($cart_items as $cart_item) 
                  $total_price += ($cart_item['price'] * $cart_item['qty_add']);
                echo number_format($total_price).'đ';
              ?>
            </p>
          </div>
          <?php if(count($cart_items) > 0): ?>
            <a class="checkout" href="../Checkout/checkout.php">CHECKOUT VÀ ĐẶT HÀNG</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </main>
  <?php require_once("../global/footer.php"); ?>
</div>