<?php
  if(session_id() === '') session_start();
  if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $first_name_err = $last_name_err = $country_err = $address_err = $city_err = $phone_err = $email_err = "";
    if(isset($_POST['first_name']) && !empty(trim($_POST['first_name']))) {
      $first_name = trim($_POST['first_name']); 
    }
    else {
      $first_name_err = "<script>alert('Tên không hợp lệ')</script>";
      echo $first_name_err;
    }
    if(isset($_POST['last_name']) && !empty(trim($_POST['last_name']))) {
      $last_name = trim($_POST['last_name']); 
    }
    else {
      $last_name_err = "<script>alert('Họ không hợp lệ')</script>";
      echo $last_name_err;
    }
    if(isset($_POST['country']) && !empty(trim($_POST['country']))) {
      $country = trim($_POST['country']); 
    }
    else {
      $country_err = "<script>alert('Quốc gia không hợp lệ')</script>";
      echo $country_err;
    }
    if(isset($_POST['address']) && !empty(trim($_POST['address']))) {
      $address = trim($_POST['address']); 
    }
    else {
      $address_err = "<script>alert('Địa chỉ không hợp lệ')</script>";
      echo $address_err;
    }
    if(isset($_POST['city']) && !empty(trim($_POST['city']))) {
      $city = trim($_POST['city']); 
    }
    else {
      $city_err = "<script>alert('Thành phố không hợp lệ')</script>";
      echo $city_err;
    }
    if(isset($_POST['phone']) && !empty(trim($_POST['phone']))) {
      $phone = trim($_POST['phone']); 
    }
    else {
      $phone_err = "<script>alert('Số điện thoại không hợp lệ')</script>";
      echo $phone_err;
    }
    if(isset($_POST['email']) && !empty(trim($_POST['email'])) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = trim($_POST['email']); 
    }
    else {
      $email_err = "<script>alert('Email không hợp lệ')</script>";
      echo $email_err;
    }
    if(empty($first_name_err) && empty($last_name_err) && empty($country_err) && empty($address_err) && empty($city_err) && empty($phone_err) && empty($email_err)) {
      include "../config/dbconnect.php";
      $sql = "UPDATE tbl_customer SET first_name=?, last_name=?, country=?, street_address=?, city=?, phone=?, email=? WHERE id=?";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("sssssssi", $first_name_param, $last_name_param, $country_param, $address_param, $city_param, $phone_param, $email_param, $id_param);
        $first_name_param = $first_name;
        $last_name_param = $last_name; 
        $country_param = $country;
        $address_param = $address;
        $city_param = $city; 
        $phone_param = $phone;
        $email_param = $email;
        $id_param = $_SESSION['current_user']['id'];
        $res = $statement->execute() ? 'location: profile.php?update=success' : 'location: profile.php?update=failed';
        header($res);
      }
    }
  }
  else {
    echo "Bad request";
  }
?>