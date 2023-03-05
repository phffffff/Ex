<?php 
  if(session_id() === '') session_start();
  require_once "order_funcs.php";
  if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $first_name_err = $last_name_err = $country_err = $address_err = $city_err = $phone_err = $email_err = $addition_opt_err = $payment_method_err = "";
    // Validate inputs
    if(isset($_POST['firstname']) && !empty(trim($_POST['firstname']))) {
      $first_name = trim($_POST['firstname']); 
    }
    else {
      $first_name_err = "<script>alert('Vui lòng cung cấp First name')</script>";
      echo $first_name_err;
    }

    if(isset($_POST['lastname']) && !empty(trim($_POST['lastname']))) 
      $last_name = trim($_POST['lastname']); 
    else {
      $last_name_err = "<script>alert('Vui lòng cung cấp Last name')</script>";
      echo $last_name_err;
    }

    if(isset($_POST['country']) && !empty(trim($_POST['country']))) 
      $country = trim($_POST['country']); 
    else {
      $country_err = "<script>alert('Vui lòng cung cấp Country')</script>";
      echo $country_err;
    }

    if(isset($_POST['address']) && !empty(trim($_POST['address']))) 
      $address = trim($_POST['address']); 
    else {
      $address_err = "<script>alert('Vui lòng cung cấp Address')</script>";
      echo $address_err;
    }

    if(isset($_POST['city']) && !empty(trim($_POST['city']))) 
      $city = trim($_POST['city']); 
    else {
      $city_err = "<script>alert('Vui lòng cung cấp City')</script>";
      echo $city_err;
    }

    if(isset($_POST['phone']) && !empty(trim($_POST['phone']))) 
      $phone = trim($_POST['phone']); 
    else {
      $phone_err = "<script>alert('Vui lòng cung cấp Phone')</script>";
      echo $phone_err;
    }

    if(isset($_POST['email']) && !empty(trim($_POST['email']))) 
      $email = trim($_POST['email']); 
    else {
      $email_err = "<script>alert('Vui lòng cung cấp Email')</script>";
      echo $email_err;
    }

    if(isset($_POST['addition-opt']) && !empty(trim($_POST['addition-opt']))) 
      $addition_opt = trim($_POST['addition-opt']); 
    else {
      $addition_opt_err = "<script>He he</script>";
      echo $addition_opt_err;
    }

    if(isset($_POST['payment-method']) && !empty(trim($_POST['payment-method']))) {
      $payment_method = explode("-", $_POST['payment-method']);
      $payment_method_id = (Int)$payment_method[0];
    }
    else {
      $payment_method_err = "<script>alert('Vui lòng chọn phương thức thanh toán')</script>";
      echo $payment_method_err;
    }

    if(empty($first_name_err) && empty($last_name_err) && empty($country_err) && empty($address_err) && empty($city_err) && empty($phone_err) && empty($email_err) && empty($addition_opt_err) && empty($payment_method_err)) {
      if(isset($_SESSION['current_user']) && !isset($_POST['username-email'], $_POST['password'])) {
        $_SESSION['current_user']['order'] = [
          'order_id' => trim($_POST['order_id']),
          'order_total' => trim($_POST['cart_total']),
          'addition_opt' => $addition_opt, 
          'payment_method_id' => $payment_method_id
        ];
        if($payment_method_id === 2) {
          $_SESSION['current_user']['order']['bank_code'] = trim($_POST['bank_code']);
          header('location: vnpay_create_payment.php');  
        }
        else {
          $res = AddOrder(trim($_POST['order_id']), $_SESSION['current_user']['id'], 2, $first_name, $last_name, $country, $address, $city, $phone, $email, $addition_opt, $payment_method_id, NULL, NULL, NULL, NULL);
          if(strtoupper($res) === 'SUCCESS') 
            header('location: checkout.php?ckout=success');
          else 
            header('location: checkout.php?ckout=failed');
        }
      }
      else {
        $_SESSION['guest'] = [
          'first_name' => $first_name,
          'last_name' => $last_name, 
          'country' => $country,
          'address' => $address,
          'city' => $city,
          'phone' => $phone, 
          'email' => $email,
          'order' => [
            'order_id' => trim($_POST['order_id']), 
            'order_total' => trim($_POST['cart_total']), 
            'addition_opt' => $addition_opt,
            'payment_method_id' => $payment_method_id
          ]
        ];
        if($payment_method_id === 2) {
          $_SESSION['guest']['order']['bank_code'] = trim($_POST['bank_code']); 
          header('location: vnpay_create_payment.php');
        }
        else {
          $res = AddOrder(trim($_POST['order_id']), 0, 3, $first_name, $last_name, $country, $address, $city, $phone, $email, $addition_opt, $payment_method_id, NULL, NULL, NULL, NULL);
          if(strtoupper($res) === 'SUCCESS')
            header('location: checkout.php?ckout=success');
          else 
            header('location: checkout.php?ckout=failed');
        }
      }
    }
  }
?>