<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
  * {
    margin: 0;
    padding: 0; 
    box-sizing: border-box; 
  }
  .authen-container {
    width: 100%;
    height: 100%;
    display: flex; 
  }
  .banner-container {
    flex: 4 0 0px; 
  }
  .banner-container img {
    width: 100%;
    height: 100%;
  }
  .authen-area {
    display: flex;
    flex-direction: column; 
    flex: 3 0 0px; 
  }
  .shop-title {
    flex: 1 0 0px; 
  }
  .authen-wrapper {
    display: flex; 
    justify-content: center; 
    align-items: center;
    flex: 8 0 0px; 
  }
  #authen-form {
    display: flex; 
    align-items: center; 
    flex-direction: column;
    width: 60%;
    height: 85%;
  }
  #authen-form h2 {
    font-family: 'Poppins';
    margin-bottom: 20px;
  }
  .input-confirm {
    display: flex; 
    width: 100%;
    flex-direction: column; 
    margin-top: 25px;
  }
  .input-label {
    font-size: 17px; 
  }
  .input-box {
    margin-top: 12px;
    padding: 13px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    box-shadow: 0px 1px 5px #E4E4E4;
  }
  #authen-submit-btn {
    width: 100%;
    height: 50px;
    margin-top: 40px;
    background-color: rgb(202,0,0);
    color: white;
    border: 2px solid rgb(202,0,0);
    border-radius: 5px;
    font-size: 16px;
    box-shadow: 0px 3px 5px #E4E4E4;
  }
  .signup-link {
    margin-top: 35px;
    font-size: 17px;
    color: rgb(202,0,0);
    text-decoration: none;
  }
</style>
<?php 
  define("AUTHEN_SIGNUP", "SIGNUP");
  define("AUTHEN_SIGNIN", "LOGIN");
?>
<div class="authen-container">
  <div class="banner-container">
    <img src="https://images.unsplash.com/photo-1581873372796-635b67ca2008?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80">
  </div>
  <div class="authen-area">
    <div class="shop-title">

    </div>
    <div class="authen-wrapper">
      <form id="authen-form" action="<?= isset($_GET['authen']) && strtoupper($_GET['authen']) === AUTHEN_SIGNUP ? 'register.php' : 'login.php'?>" method="POST">
        <h2><?= isset($_GET['authen']) && strtoupper($_GET['authen']) === AUTHEN_SIGNUP ? 'Sign Up' : 'Login'?></h2>
        <div class="input-confirm">
          <label class="input-label" for="email">Email</label>
          <input class="input-box" type="text" name="email">
        </div>
        <div class="input-confirm">
          <label class="input-label" for="password">Mật khẩu</label>
          <input class="input-box" type="password" name="password">
        </div>
        <?php if(isset($_GET['authen']) && strtoupper($_GET['authen']) === AUTHEN_SIGNUP): ?>
        <div class="input-confirm">
          <label class="input-label" for="confrm-password">Nhập lại mật khẩu</label>
          <input class="input-box" type="password" name="confrm-password">
        </div>
        <?php endif ?>
        <input id="authen-submit-btn" type="submit" value="<?= isset($_GET['authen']) && strtoupper($_GET['authen']) === AUTHEN_SIGNUP ? 'Đăng ký' : 'Đăng nhập'?>">
        <?php if((isset($_GET['authen']) && strtoupper($_GET['authen']) === AUTHEN_SIGNIN) || !isset($_GET['authen'])): ?>
        <a class="signup-link" href="authen_form.php?authen=signup">Đăng ký khách hàng</a>
        <?php endif ?>
      </form>
    </div>
  </div>
</div>