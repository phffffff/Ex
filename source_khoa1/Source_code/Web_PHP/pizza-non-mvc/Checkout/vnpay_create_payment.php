<?php 
  if(session_id() === '') session_start(); 
  require_once "vnpay_config.php"; 
  $vnp_TxnRef = isset($_SESSION['current_user']) ? $_SESSION['current_user']['order']['order_id'] : $_SESSION['guest']['order']['order_id'];
  $vnp_total = isset($_SESSION['current_user']) ? $_SESSION['current_user']['order']['order_total'] : $_SESSION['guest']['order']['order_total'];
  $vnp_bankcode = isset($_SESSION['current_user']) ? $_SESSION['current_user']['order']['bank_code'] : $_SESSION['guest']['order']['bank_code'];
  $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
  $vnp_Locale = 'vn';
  $vnp_OrderInfo = 'pizza_house_order';
  $vnp_OrderType = 'billpayment';

  $inputData = array(
    "vnp_Version" => "2.0.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => str_replace(',', '', $vnp_total) * 100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef
  );

  if (isset($vnp_bankcode) && $vnp_bankcode != "")
    $inputData['vnp_BankCode'] = $vnp_bankcode;

  ksort($inputData);
  $query = "";
  $i = 0;
  $hashdata = "";
  foreach ($inputData as $key => $value) {
    if ($i == 1) 
      $hashdata .= '&' . $key . "=" . $value;
    else {
      $hashdata .= $key . "=" . $value;
      $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
  }

  $vnp_Url = $vnp_Url . "?" . $query;
  if (isset($vnp_HashSecret)) { 
  // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
   	$vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
  }
  $returnData = array(
    'code' => '00', 
    'message' => 'success', 
    'data' => $vnp_Url
  );
  header('location: ' . $vnp_Url);
?>