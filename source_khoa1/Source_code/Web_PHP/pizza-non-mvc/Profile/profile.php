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
    width: 100%;
    padding-top: 100px;
    padding-bottom: 100px;
  }
  .profile-area {
    display: flex; 
    justify-content: center; 
    align-items: center;
    width: 95%;
  }
  .profile-wrapper {
    display: flex; 
    flex-direction: column;
    width: 73rem;
  }
  .notifi-popup {
    width: 100%;
    height: 70px; 
    background-color: #F5F5F5;
    border-top: 3px solid #1e85be;
    padding: 26px 0px 0px 30px; 
    font-size: 17px;
    margin-bottom: 10px;
  }
  .profile-details {
    display: flex; 
    flex-direction: column; 
    align-items: center;
    width: 45rem;
  }
  .input-label {
    font-size: 17px; 
    color: gray;
  }
  .input-box {
    width: 100%;
    height: 55px;
    border: none;
    border-radius: 22px;
    background-color: #F5F5F5;
    margin-top: 10px;
    padding-left: 20px;
  }
  .profile-username {
    display: flex;
    width: 80%; 
    justify-content: space-between;
    margin-top: 30px;
  }
  .username-part {
    display: flex;
    flex-direction: column; 
    width: 46%;
  }
  .profile-part {
    display: flex;
    width: 80%;
    flex-direction: column;
    margin-top: 30px;
  }
  .select-options {
    border: none;
    box-shadow: 0px 1.5px 5px #C0C0C0;
    height: 40px;
    margin-top: 12px;
    border-radius: 5px;
    font-size: 15px;
    padding-left: 10px;
  }
  .select-options:focus {
    border: 3px solid powderblue;
  }
  .profile-avatar-wrapper {
    display: flex; 
    justify-content: center; 
    width: 28rem; 
    padding-top: 30px;
  }
  .profile-avatar-wrapper img {
    width: 240px;
    height: 240px;
    border-radius: 180px;
  }
  .update-profile-btn {
    text-align: center;
    padding: 12px 18px 12px 18px; 
    background-color: rgb(201, 0, 0);
    border: 2px solid rgb(201, 0, 0);
    border-radius: 8px;
    color: white;
    font-size: 19px;
    font-family: 'Graviola Soft W01';
  }
  .update-profile-btn:hover  {
    background-color: white;
    color: rgb(201, 0, 0);
  }
  .profile-orders {
    margin-top: 110px;
  }
  .profile-orders h2 {
    font-family: 'Graviola Soft W01';
  }
  .styled-table {
    border-collapse: collapse;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width: 100%;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
  }
  .styled-table thead tr {
    background: rgb(201,0,0);
    color: #ffffff;
    text-align: center;
    font-weight: bold; 
  }
  .styled-table th, .styled-table td {
    padding: 20px 20px;
    text-align: center;
  }
  .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
  }
  .styled-table tbody tr:nth-of-type(even) {
    background-color: #f5f5f5;
  }
  .styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
  }
</style>
<?php if(session_id() === '') session_start(); ?>
<div style="width: 100%; height: 0;">
  <?php 
    $mvar = "6";
    require_once "../global/short_banner.php"; 
    include "../config/dbconnect.php";
    $sql = 
      "SELECT 
        tbl_order.id AS order_id,
        order_date,
        state,
        product_name,
        price, 
        addon_val,
        addon_price,
        cart_order_num_id,
        order_qty AS quantity
      FROM 
        tbl_product,
        tbl_order, 
        tbl_order_item_group, 
        tbl_order_item_option,
        tbl_addon_values, 
        tbl_order_state,
        tbl_customer
      WHERE 
        tbl_order_item_option.addon_value_id = tbl_addon_values.id AND
        tbl_order_item_option.product_id = tbl_product.id AND
        tbl_order_item_option.cart_order_num_id = tbl_order_item_group.id AND
        tbl_order_item_option.order_id = tbl_order.id AND
        tbl_order_item_group.order_id = tbl_order.id AND
        tbl_order.order_state_id = tbl_order_state.id AND
        tbl_order.customer_id = tbl_customer.id AND
        tbl_customer.id = ".$_SESSION['current_user']['id'];
  
    $res = $mysqli->query($sql);

    if($res->num_rows > 0) {
      $orders = array();
      $order_id_tmp = $cart_num_id = 0;
      $prevent_loop_order_id = 0; 
      $prevent_loop_cart_num_id = 0;
      while ($order = $res->fetch_object()) {
        if($order->order_id != $order_id_tmp) {
          $order_id_tmp = $order->order_id;
          $orders[$order_id_tmp] = array();
          $prevent_loop_order_id = 0; 
        }
        if($prevent_loop_order_id != 1) {
          $orders[$order->order_id]['order_date'] = $order->order_date;
          $orders[$order->order_id]['order_state'] = $order->state;
          $prevent_loop_order_id = 1; 
        }
        if($order->cart_order_num_id != $cart_num_id) {
          $cart_num_id = $order->cart_order_num_id;
          $orders[$order->order_id]['products'][$cart_num_id] = array();
          $prevent_loop_cart_num_id = 0;
        }
        if($prevent_loop_cart_num_id != 1) {
          $orders[$order->order_id]['products'][$order->cart_order_num_id]['product_name'] = $order->product_name;
          $orders[$order->order_id]['products'][$order->cart_order_num_id]['product_price'] = $order->price; 
          $orders[$order->order_id]['products'][$order->cart_order_num_id]['quantity'] = $order->quantity;
        }
        $orders[$order->order_id]['products'][$order->cart_order_num_id]['addons'][$order->addon_val] = $order->addon_price;
      }
    }
  ?>
  <main class="main">
    <div class="profile-area">
      <div class="profile-wrapper">
        <?php 
          if(isset($_GET['update'])): ?>
            <div class="notifi-popup">
              <p><?= strtoupper(trim($_GET['update'])) === 'SUCCESS' ? 'Đã cập nhật thông tin của bạn' : 'Cập nhật thất bại' ?></p>
            </div>
        <?php endif ?>
        <div style="width: 100%; display: flex; flex-wrap: wrap; justify-content: center;">
          <div class="profile-avatar-wrapper">
            <img src="https://secure.gravatar.com/avatar/d407b5f519f976de75be5afb6a140c74?s=150&r=g&d=https://hatinhcogi.com/wp-content/plugins/userswp/assets/images/no_profile.png">
          </div>
          <form class="profile-details" action="update_profile.php" method="POST">
            <div class="profile-username">
              <div class="username-part">
                <label class="input-label" for="first_name">Tên <span style="color: red; font-size: 20px;">*</span></label>
                <input class="input-box" type="text" name="first_name" value="<?= $_SESSION['current_user']['first_name'] ?>">
              </div>
              <div class="username-part">
                <label class="input-label" for="last_name">Họ <span style="color: red; font-size: 20px;">*</span></label>
                <input class="input-box" type="text" name="last_name" value="<?= $_SESSION['current_user']['last_name'] ?>">
              </div>
            </div>
            <div class="profile-part">
              <label class="input-label">Quốc gia</label>
              <select class="select-options" name="country">
                <option value="America">America</option>
                <option value="VietNam">VietNam</option>
                <option value="China">China</option>
              </select>
            </div>
            <div class="profile-part">
              <label class="input-label" for="address">Địa chỉ <span style="color: red; font-size: 20px;">*</span></label>
              <input class="input-box" type="text" name="address" value="<?= $_SESSION['current_user']['address'] ?>" >
            </div>
            <div class="profile-part">
              <label class="input-label" for="city">Thành phố <span style="color: red; font-size: 20px;">*</span></label>
              <input class="input-box" type="text" name="city" value="<?= $_SESSION['current_user']['city'] ?>">
            </div>
            <div class="profile-part">
              <label class="input-label" for="phone">Điện thoại <span style="color: red; font-size: 20px;">*</span></label>
              <input class="input-box" type="text" name="phone" value="<?= $_SESSION['current_user']['phone'] ?>">
            </div>
            <div class="profile-part">
              <label class="input-label" for="email">Email <span style="color: red; font-size: 20px;">*</span></label>
              <input class="input-box" type="text" name="email" value="<?= $_SESSION['current_user']['email'] ?>">
            </div>
            <div class="profile-part">
              <button type="submit" class="update-profile-btn">Cập nhật</button>
            </div>
          </form>
        </div>
        <div class="profile-orders">
          <h2>Đơn hàng của bạn</h2>
          <table class="styled-table">
            <thead>
              <tr>
                <th>Mã đơn hàng</th>
                <th>Thực đơn order</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach($orders as $order_id => $order_detail) {
                  $order_total = 0;
                  echo "<tr>";
                  echo "<td>$order_id</td>";
                  echo "<td>";
                  foreach($order_detail['products'] as $order_num_id => $order_item) {
                    $order_total += $order_item['product_price'];
                    echo $order_item['product_name']." - ";
                    foreach($order_item['addons'] as $addon_name => $addon_price) {
                      $order_total += $addon_price;
                      echo $addon_name.", ";
                    }
                    echo " x ". $order_item['quantity']."<br><br>";
                  }
                  echo "</td>";
                  echo "<td>".$order_detail['order_date']."</td>";
                  echo "<td>".number_format($order_total)."đ</td>";
                  echo "<td>".$order_detail['order_state']."</td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php 
    include_once("../global/footer.php");
  ?>
</div>