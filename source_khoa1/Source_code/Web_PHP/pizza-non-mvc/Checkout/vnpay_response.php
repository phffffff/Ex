<?php
  ob_start();
  if(session_id() === '') session_start();
  require_once "order_funcs.php";
  require_once "vnpay_config.php";
  $vnp_SecureHash = $_GET['vnp_SecureHash'];
  $inputData = array();
  foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") 
      $inputData[$key] = $value;
  }
  unset($inputData['vnp_SecureHashType']);
  unset($inputData['vnp_SecureHash']);
  ksort($inputData);
  $i = 0;
  $hashData = "";
  foreach ($inputData as $key => $value) {
    if ($i == 1) 
      $hashData = $hashData . '&' . $key . "=" . $value;
    else {
      $hashData = $hashData . $key . "=" . $value;
      $i = 1;
    }
  }
  //$secureHash = md5($vnp_HashSecret . $hashData);
  $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
  if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
      $order_id = $_GET['vnp_TxnRef'];
      $vnp_response_code = $_GET['vnp_ResponseCode'];
      $code_vnpay = $_GET['vnp_TransactionNo'];
      $code_bank = $_GET['vnp_BankCode'];
      $time = $_GET['vnp_PayDate'];
      $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);
      $res = AddOrder(
        $order_id, 
        isset($_SESSION['current_user']) ? $_SESSION['current_user']['id'] : 0,
        isset($_SESSION['current_user']) ? 2 : 3,
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['first_name']) : trim($_SESSION['guest']['first_name']),
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['last_name']) : trim($_SESSION['guest']['last_name']),
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['country']) : trim($_SESSION['guest']['country']),
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['address']) : trim($_SESSION['guest']['address']),
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['city']) : trim($_SESSION['guest']['city']),
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['phone']) : trim($_SESSION['guest']['phone']),
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['email']) : trim($_SESSION['guest']['email']),
        isset($_SESSION['current_user']) ? trim($_SESSION['current_user']['order']['addition_opt']) : trim($_SESSION['guest']['order']['addition_opt']),
        isset($_SESSION['current_user']) ? $_SESSION['current_user']['order']['payment_method_id'] : $_SESSION['guest']['order']['payment_method_id'],
        $vnp_response_code,
        $code_vnpay,
        $code_bank,
        $date_time
      );
      if(strtoupper($res) === 'SUCCESS')
        header('location: checkout.php?ckout=success&pay_method=bank');
      else 
        header('location: checkout.php?ckout=failed&pay_method=bank');
    } 
    else echo "GD Khong thanh cong";
  } 
  else echo "Chu ky khong hop le";
?>
