<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<meta charser="utf-8">
<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  #header-nav {
    display: flex;
    width: 100%;
    height: 130px; 
    justify-content: center;
    background-color: transparent;
    position: fixed;
    z-index: 1000;
    transition: 0.5s; 
  }
  #header-nav.sticky {
    height: 90px;
    background-color: white;
    box-shadow: 0px 1px 2px #E4E4E4;
  }
  .header-nav-wrapper {
    display: flex;
    width: 70rem;
    height: 100%;
  }
  .nav-aside {
    display: flex;
    flex-direction: column;
    flex: 3 0 0px; 
    justify-content: center;
  }
  .header-nav-center {
    flex: 2 0 0px; 
  }
  .header-nav-left ul {
    display: flex;
    list-style: none;
    justify-content: space-between;
  }
  .header-nav-tab {
    color: white;
    font-family: 'Poppins'
  }
  .header-nav-tab a {
    font-family: 'Poppins';
    font-size: 15px;
    color: white;
    text-decoration: none;
    transition: 0.5s;
  }
  .header-nav-center {
    display: flex;
    justify-content: center;
  }
  .header-nav-center img {
    width: 150px;
    height: 165px;
    transition: 0.2s;
  }
  .header-nav-right-wrapper {
    display: flex;
    justify-content: space-between;
  }
  .header-nav-right-phone {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .header-nav-right-cart {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: -15px;
  } 
  .header-nav-right-user {
    font-size: 22px;
  }
  #header-nav.sticky .header-nav-tab {
    color: black;
  }
  #header-nav.sticky .header-nav-tab a {
    color: black;
  }
  #header-nav.sticky .header-nav-center img {
    width: 80px;
    height: 90px;
  }
</style>
<nav id="header-nav">
  <div class="header-nav-wrapper">
    <div class="header-nav-left nav-aside">
      <ul>
        <li class="header-nav-tab"><a href="../Home/home.php">Trang chủ</a></li>
        <li class="header-nav-tab"><a href="../Menu/menu.php">Thực đơn</a></li>
        <li class="header-nav-tab"><a href="../News/news.php">Sự kiện</a></li>
        <li class="header-nav-tab"><a href="#">Liên hệ</a></li>
      </ul>
    </div>
    <div class="header-nav-center">
      <img src="http://pizzahouse.themerex.net/wp-content/uploads/2016/08/logo_main.png">
    </div>
    <div class="header-nav-right nav-aside">
      <div class="header-nav-right-wrapper">
        <div class="header-nav-right-phone header-nav-tab">
          <ion-icon name="call"></ion-icon>
          <p style="margin-left: 5px;">100198</p>
        </div>
        <div class="header-nav-right-cart header-nav-tab">
          <ion-icon name="cart"></ion-icon>
          <a href="../Cart/cart.php" style="margin-left: 5px;">
          <?php 
            function get_header_cart_info($session) {
              $cart_items = isset($session) && !empty($session) ? $session : [];
              $cart_amount = 0;
              $total_price = 0; 
              foreach($cart_items as $cart_item) {
                $total_price += ($cart_item['price'] * $cart_item['qty_add']); 
                $cart_amount += $cart_item['qty_add'];
              }
              return $cart_amount.' order - '.number_format($total_price).'đ';
            }
            echo isset($_SESSION['current_user']) ? (isset($_SESSION['current_user']['cart']) ? get_header_cart_info($_SESSION['current_user']['cart']) : '0 order - 0đ') : 
                (isset($_SESSION['cart']) ? get_header_cart_info($_SESSION['cart']) : '0 order - 0đ');
          ?>
          </a>
        </div>
        <div class="header-nav-right-user">
          <?php if(isset($_SESSION['current_user'])) { ?>
            <a href="../Profile/profile.php">
             <ion-icon class="header-nav-tab" name="person"></ion-icon>
            </a>
          <?php } else { ?>
            <a href="../Authentication/authen_form.php" style="display: flex; text-decoration: none; justify-content: center; align-items: center; padding: 8px 15px 8px 15px; background-color: rgb(201,0,0); font-size: 18px; color: white; border-radius: 5px;">Đăng nhập</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</nav>
<script type="text/javascript">
  window.addEventListener("scroll", () => {
    var header = document.getElementById("header-nav");
    header.classList.toggle("sticky", window.scrollY > 0);
  })
</script>