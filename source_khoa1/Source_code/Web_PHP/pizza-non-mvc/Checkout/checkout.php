<?php if(session_id() === '') session_start(); ?>
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
    padding: 120px 0px 120px 0px;
  }
  .checkout-area {
    display: flex; 
    justify-content: center; 
    align-items: center;
    width: 95%;
  }
  .checkout-form {
    width: 73rem; 
  }
  .checkout-wrapper {
    display: flex;
    flex-direction: column;
    width: 100%;
  }
  .checkout-options {
    width: 100%;
  }
  .login-option {
    display: flex; 
    flex-direction: column;
    width: 100%;
    height: 428px; 
  }
  .option-popup {
    width: 100%;
    height: 70px; 
    background-color: #F5F5F5;
    border-top: 3px solid #1e85be;
    padding: 26px 0px 0px 30px; 
    font-size: 17px;
    margin-bottom: 10px;
  }
  #login-option-detail {
    width: 100%;
    height: 300px; 
    border: 1px solid #DDDDDD; 
    margin-top: 28px;
    padding: 20px 20px 10px 20px;
  }
  .login-actions {
    display: flex; 
    height: 175px;
    flex-direction: column;
    margin-top: 30px;
  }
  .login-inputs {
    display: flex; 
    flex: 3 0 0px; 
    justify-content: space-between;
    margin-top: 30px;
  }
  .login-input {
    display: flex; 
    flex-direction: column;
    width: 47%;
  }
  .input-label {
    font-size: 17px; 
    color: gray;
  }
  .input-box {
    width: 100%;
    height: 48px;
    border: none;
    border-radius: 22px;
    background-color: #F5F5F5;
    margin-top: 10px;
    padding-left: 20px;
  }
  .login-confirm {
    display: flex;
    flex: 2 0 0px;
    margin-top: 30px;
  }
  .login-btn {
    background-color: rgb(201, 0, 0);
    color: white;
    width: 110px; 
    height: 48px;
    border: none;
    border-radius: 50px;
    font-family: 'Graviola Soft W01';
  }
  .login-btn:hover {
    background-color: white;
    color: rgb(201,0,0);
    border: 2px solid rgb(201,0,0);
  }
  .login-remember-option {
    display: flex; 
    align-items: center;
    margin-left: 15px; 
  }
  .coupon-option {
    margin-bottom: 30px;
  }
  #coupon-option-detail {
    height: 150px; 
    margin-top: 28px;
    border: 1px solid #DDDDDD;
    padding: 20px 20px 10px 20px;
  }
  .coupon-actions {
    display: flex; 
    margin-top: 30px;
  }
  .coupon-input {
    width: 47%;
  }
  .apply-coupon-btn {
    width: 150px; 
    border: none;
    height: 48px;
    border-radius: 50px;
    background-color: rgb(201,0,0);
    color: white;
    margin-left: 65px;
    margin-top: 10px;
    text-transform: uppercase;
    font-size: 12px; 
    font-family: 'Graviola Soft W01';
  }
  .checkout-details {
    display: flex; 
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
  }
  .checkout-billing {
    display: flex; 
    flex-direction: column;
    width: 38.5rem;
    margin-bottom: 60px;
  }
  .checkout-part-title {
    display: flex; 
    align-items: center;
    font-family: 'Graviola Soft W01';
    color: #444444;
  }
  .billing-username {
    display: flex;
    width: 89%; 
    justify-content: space-between;
    margin-top: 30px;
  }
  .username-part {
    display: flex;
    flex-direction: column; 
    width: 46%;
  }
  .billing-part {
    display: flex;
    width: 89%;
    flex-direction: column;
    margin-top: 30px;
  }
  #make-account-input {
    display: none;
    margin-top: 20px;
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
  .checkout-additional {
    display: flex; 
    flex-direction: column; 
    width: 34.5rem; 
  }
  .additional-order-notes {
    display: flex; 
    flex-direction: column;
    margin-top: 30px;
  }
  .input-area {
    height: 120px;
    border: none;
    border-radius: 25px;
    margin-top: 10px; 
    background-color: #F5F5F5;
    padding: 15px 0px 12px 18px;
  }
  tr {
    text-align: center;
  }
  th {
    padding: 9px 0px;
    font-size: 18px;
    border-bottom: 1px solid rgba(0,0,0,.1);
  }
  td {
    padding: 9px 0px;
    border-bottom: 1px solid rgba(0,0,0,.1);
  }
  table {
    color: #717272;
    font-size: 100%;
    border-spacing: 0;
    border: 1px solid rgba(0,0,0,.1);
    margin: 0 -1px 24px 0;
    text-align: left;
    width: 100%;
    border-collapse: collapse;
    border-radius: 5px;
  }
  .place_order {
    width: 100%;
    background-color: #717272;
  }
  .place_order input {
    float: right;
    padding: 0.8em 1.8em;
    background-color: #ca0808;
    color: white;
    border: none;
    font-size: 1em;
    line-height: 1.3em;
    font-weight: 700;
    border-radius: 2.3em;
    border: 2px solid #ca0808;
  }
  .place_order input:hover {
    background-color: white;
    color: #ca0808;
    border: 2px solid #ca0808;
  }
</style>
<div style="width: 100%; height: 0;">
  <?php 
    $mvar = "5";
    require_once "../global/short_banner.php"; 
    include "C:/xampp/htdocs/pizza-non-mvc/config/dbconnect.php";  
  ?>
  <main class="main">
    <div class="checkout-area">
      <form class="checkout-form" action="checkout_navigation.php" method="POST">
        <div class="checkout-wrapper">
      <?php 
        if(isset($_GET['ckout'])): ?>
          <div class="option-popup">
            <p><?= strtoupper(trim($_GET['ckout'])) === 'SUCCESS' ? 'Order success' : 'Order failed' ?></p>
          </div>
      <?php endif ?>
          <div class="checkout-options">
          <?php // if(!isset($_SESSION['current_user'])): ?>
            <!-- <div class="login-option">
              <div class="option-popup">
                <p>Returning customer? <span style="color: red;">Click here to login</span></p>
              </div>
              <div id="login-option-detail">
                <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.</p>
                <form class="login-actions">
                  <div class="login-inputs">
                    <div class="login-input">
                      <label class="input-label" for="username-email">Username hoặc email <span style="color: red; font-size: 20px;">*</span></label>
                      <input class="input-box" type="text" name="username-email">
                    </div>
                    <div class="login-input">
                      <label class="input-label" for="password">Password <span style="color: red; font-size: 20px;">*</span></label>
                      <input class="input-box" type="text" name="password">
                    </div>
                  </div>
                  <div class="login-confirm">
                    <input class="login-btn" type="submit" value="Đăng nhập">
                    <div class="login-remember-option">
                      <input type="checkbox" name="login-remember-option">
                      <label style="margin-left: 5px;" for="login-remember-option">Lưu đăng nhập</label>
                    </div>
                  </div>
                </form>
                <p>Lost your password?</p>
              </div>
            </div> -->
            <?php // endif ?>
            <div class="coupon-option">
              <div class="option-popup">
                <p>Have a coupon? <span style="color: red;">Click here to enter your code</span></p>
              </div>
              <div id="coupon-option-detail">
                <p>If you have a coupon code, please apply it below.</p>
                <form class="coupon-actions">  
                  <input class="input-box coupon-input" type="text" placeholder="Coupon code">
                  <input class="apply-coupon-btn" type="submit" value="apply coupon">
                </form>
              </div>
            </div>
          </div>
          <div class="checkout-details">
            <div class="checkout-billing">
              <h3 class="checkout-part-title">Billing Details</h3>
              <div class="billing-username">
                <div class="username-part">
                  <label class="input-label" for="firstname">Tên <span style="color: red; font-size: 20px;">*</span></label>
                  <input class="input-box" type="text" name="firstname" value="<?= isset($_SESSION['current_user']) ? $_SESSION['current_user']['first_name'] : '' ?>">
                </div>
                <div class="username-part">
                  <label class="input-label" for="lastname">Họ <span style="color: red; font-size: 20px;">*</span></label>
                  <input class="input-box" type="text" name="lastname" value="<?= isset($_SESSION['current_user']) ? $_SESSION['current_user']['last_name'] : '' ?>">
                </div>
              </div>
              <div class="billing-part">
                <label class="input-label">Quốc gia</label>
                <select class="select-options" name="country">
                  <option value="America">America</option>
                  <option value="VietNam">VietNam</option>
                  <option value="China">China</option>
                </select>
              </div>
              <div class="billing-part">
                <label class="input-label" for="address">Địa chỉ <span style="color: red; font-size: 20px;">*</span></label>
                <input class="input-box" type="text" name="address" value="<?= isset($_SESSION['current_user']) ? $_SESSION['current_user']['address'] : '' ?>">
              </div>
              <div class="billing-part">
                <label class="input-label" for="city">Thành phố <span style="color: red; font-size: 20px;">*</span></label>
                <input class="input-box" type="text" name="city" value="<?= isset($_SESSION['current_user']) ? $_SESSION['current_user']['city'] : '' ?>">
              </div>
              <div class="billing-part">
                <label class="input-label" for="phone">Điện thoại <span style="color: red; font-size: 20px;">*</span></label>
                <input class="input-box" type="text" name="phone" value="<?= isset($_SESSION['current_user']) ? $_SESSION['current_user']['phone'] : '' ?>">
              </div>
              <div class="billing-part">
                <label class="input-label" for="email">Email <span style="color: red; font-size: 20px;">*</span></label>
                <input class="input-box" type="text" name="email" value="<?= isset($_SESSION['current_user']) ? $_SESSION['current_user']['email'] : '' ?>">
              </div>
            </div>
            <div class="checkout-additional">
              <h3 class="checkout-part-title">Additional Information</h3>
              <div class="additional-order-notes">
                <label class="input-label" for="addition-opt">Yêu cầu khác (tùy chọn)</label>
                <textarea class="input-area" name="addition-opt" placeholder="notes about your order"></textarea>
              </div>
            </div>
          </div>
          <div class="checkout-order-review">
            <h3 class="checkout-part-title">Your order ID
              <input style="height: 40px; margin-left: 15px; border-radius: 5px; border: none; padding-left: 10px; font-size: 15px; box-shadow: 0px 1px 7px #C0C0C0;" type="text" name="order_id" value="<?php echo date("YmdHis") ?>">
            </h3><br> 
            <table>
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $cart_items = isset($_SESSION['current_user']) ? (isset($_SESSION['current_user']['cart']) ? $_SESSION['current_user']['cart'] : []) : (isset($_SESSION['cart']) ? $_SESSION['cart'] : []);
                  $cart_total = 0;
                  foreach($cart_items as $cart_item): ?>
                    <tr>
                      <td>
                        <?php 
                          echo $cart_item['product_name'].' - '; 
                          $i = 0;
                          foreach($cart_item['addons'] as $addon_val) {
                            echo $addon_val[0];
                            if($i < count($cart_item['addons'])-1) echo ', ';
                            $i++;
                          }
                        ?>  
                        &nbsp; <strong>x&nbsp;<?= $cart_item['qty_add']?></strong>
                      </td>
                      <td>
                        <span>
                          <bdi>
                            <?php 
                              $subtotal = $cart_item["price"] * $cart_item["qty_add"];
                              $cart_total += $subtotal;
                              echo number_format($subtotal); 
                            ?>
                            <span>đ</span>
                          </bdi>
                        </span>
                      </td>
                    </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <td>Total</td>
                  <td style="color: #ca0808;"><strong><span><bdi><?= number_format($cart_total) ?><span>đ</span></bdi></span></strong></td>
                  <input type="hidden" name="cart_total" value="<?= $cart_total?>">
                </tr>
              </tfoot>
            </table>
            <div class="payment-methods">
              <label class="input-label" for="payment-method">Chọn phương thức thanh toán</label><br>
              <select class="select-options" id="payment-method-options" name="payment-method" onchange="OpenCloseOnlinePayment();">
                <?php 
                  $sql = "SELECT * FROM tbl_payment_method";
                  $statement = $mysqli->prepare($sql); 
                  if($statement->execute()):
                    $mysqli_res = $statement->get_result();
                    if($mysqli_res->num_rows > 0):
                      while($payment_method = $mysqli_res->fetch_object()): ?>
                        <option value="<?= $payment_method->id ?>-<?= $payment_method->payment_method ?>"><?= $payment_method->payment_method ?></option>
                      <?php endwhile ?>
                    <?php endif ?>
                  <?php endif ?>
              </select>
              <script type="text/javascript">
                const OpenCloseOnlinePayment = () => {
                  let online_payment_opts = document.getElementById('online-payment');
                  let payment_methods = document.getElementById('payment-method-options'); 
                  online_payment_opts.style.display = payment_methods.selectedIndex === 1 ? "block" : "none";
                }
              </script>
            </div><br><br>
            <div id="online-payment" style="display: none;">
              <label class="input-label" for="bank_code">Chọn cổng thanh toán</label><br>
              <select class="select-options" name="bank_code">
                <option value="">Không chọn</option>
                <option value="NCB"> Ngân hàng NCB</option>
                <option value="AGRIBANK"> Ngân hàng Agribank</option>
                <option value="SCB"> Ngân hàng SCB</option>
                <option value="SACOMBANK">Ngân hàng SacomBank</option>
                <option value="EXIMBANK"> Ngân hàng EximBank</option>
                <option value="MSBANK"> Ngân hàng MSBANK</option>
                <option value="NAMABANK"> Ngân hàng NamABank</option>
                <option value="VNMART"> Ví điện tử VnMart</option>
                <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                <option value="HDBANK">Ngân hàng HDBank</option>
                <option value="DONGABANK"> Ngân hàng DongA</option>
                <option value="TPBANK"> Ngân hàng TPBank</option>
                <option value="OJB"> Ngân hàng OceanBank</option>
                <option value="BIDV"> Ngân hàng BIDV</option>
                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                <option value="VPBANK"> Ngân hàng VPBank</option>
                <option value="MBBANK"> Ngân hàng MBBank</option>
                <option value="ACB"> Ngân hàng ACB</option>
                <option value="OCB"> Ngân hàng OCB</option>
                <option value="IVB"> Ngân hàng IVB</option>
                <option value="VISA"> Thanh toán qua VISA/MASTER</option>
              </select>
            </div><br>
            <div class="place_order">
              <input type="submit" name="redirect" value="Yêu cầu đặt hàng">
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
  <?php require_once "../global/footer.php"; ?>
</div>