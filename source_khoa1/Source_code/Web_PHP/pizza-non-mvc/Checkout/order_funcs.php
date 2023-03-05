<?php 
  if(session_id() === '') session_start();

  function AddOrder(
    $order_id,
    $customer_id, 
    $user_type_id, 
    $first_name, 
    $last_name, 
    $country, 
    $address, 
    $city, 
    $phone, 
    $email, 
    $addition_opt, 
    $payment_method_id,
    $pay_resp_code, 
    $code_pay, 
    $code_bank,
    $time_pay
  ) {
    include "C:/xampp/htdocs/pizza-non-mvc/config/dbconnect.php";
    $res = '';
    if($customer_id === 0) {
      $sql = "INSERT INTO tbl_customer (user_type_id, first_name, last_name, country, street_address, city, phone, email, pwd) VALUES (?,?,?,?,?,?,?,?, NULL)";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param(
          "isssssss", 
          $user_type_id_param, 
          $first_name_param, 
          $last_name_param, 
          $country_param, 
          $address_param, 
          $city_param, 
          $phone_param, 
          $email_param
        );
        $user_type_id_param = $user_type_id; 
        $first_name_param = $first_name; 
        $last_name_param = $last_name; 
        $country_param = $country; 
        $address_param = $address; 
        $city_param = $city; 
        $phone_param = $phone; 
        $email_param = $email;
        if($statement->execute()) {
          $mysqli_res = $mysqli->query("SELECT LAST_INSERT_ID() AS last_id");
          if($mysqli_res->num_rows > 0) {
            $customer_id_inserted = $mysqli_res->fetch_assoc();
            $res = AddOrderItems($order_id, $customer_id_inserted['last_id'], date("Y-m-d"), 1, $addition_opt, $payment_method_id, $pay_resp_code, $code_pay, $code_bank, $time_pay);
          } 
        }
      }
      else echo "Oops!.";
    }
    else {
      $sql = "UPDATE tbl_customer SET first_name=?, last_name=?, country=?, street_address=?, city=?, phone=?, email=? WHERE id=?";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param(
          "sssssssi", 
          $first_name_param, 
          $last_name_param, 
          $country_param, 
          $address_param, 
          $city_param, 
          $phone_param, 
          $email_param, 
          $customer_id_param
        );
        $first_name_param = $first_name; 
        $last_name_param = $last_name; 
        $country_param = $country; 
        $address_param = $address; 
        $city_param = $city; 
        $phone_param = $phone; 
        $email_param = $email; 
        $customer_id_param = $customer_id;
        if($statement->execute()) {
          $res = AddOrderItems($order_id, $customer_id, date("Y-m-d"), 1, $addition_opt, $payment_method_id, $pay_resp_code, $code_pay, $code_bank, $time_pay);
          $_SESSION['current_user']['first_name'] = $first_name; 
          $_SESSION['current_user']['last_name'] = $last_name;
          $_SESSION['current_user']['country'] = $country;
          $_SESSION['current_user']['address'] = $address; 
          $_SESSION['current_user']['city'] = $city;
          $_SESSION['current_user']['phone'] = $phone; 
          $_SESSION['current_user']['email'] = $email;
        }
      }
    }
    $statement->close();
    $mysqli->close();
    return $res; 
  }

  function AddOrderItems(
    $order_id,
    $customer_id, 
    $order_date, 
    $order_state_id, 
    $addition_opt, 
    $payment_method_id,
    $pay_resp_code, 
    $code_pay, 
    $code_bank,
    $time_pay
  ) {
    include "C:/xampp/htdocs/pizza-non-mvc/config/dbconnect.php";
    $res = '';
    $sql = "INSERT INTO tbl_order (id, customer_id, order_date, order_state_id, addition_option, payment_method_id) VALUES (?,?,?,?,?,?)";
    if($statement = $mysqli->prepare($sql)) {
      $statement->bind_param("sisisi", $a, $b, $c, $d, $e, $f); 
      $a = $order_id; $b = $customer_id; $c = $order_date; $d = $order_state_id; $e = $addition_opt; $f = $payment_method_id;
      if($statement->execute()) {
        if($payment_method_id == 2) {
          $sql = "INSERT INTO tbl_order_payment (order_id, vnp_response_code, code_vnpay, code_bank, time_pay) VALUES "."('".$order_id."', '".$pay_resp_code."', '".$code_pay."', '".$code_bank."', '".$time_pay."')";
          $mysqli->query($sql);
        }
        if(isset($_SESSION['current_user'])) {
          foreach($_SESSION['current_user']['cart'] as $index => $cart_item) {
            $sql = "INSERT INTO tbl_order_item_group (order_id, cart_order_num, order_qty) VALUES "."(".$order_id.", ".$index.", ".$cart_item['qty_add'].")";
            if($mysqli->query($sql)) {
              $mysqli_res = $mysqli->query("SELECT LAST_INSERT_ID() AS last_id");
              if($mysqli_res->num_rows > 0) {
                $cart_index_id_inserted = $mysqli_res->fetch_assoc();
                foreach($cart_item['addons'] as $addon_val_id => $addon_val) {
                  $sql = "INSERT INTO tbl_order_item_option (product_id, order_id, addon_value_id, cart_order_num_id) VALUES "."(".$cart_item['id'].", ".$order_id.", ".$addon_val_id.", ".$cart_index_id_inserted['last_id'].")";
                  $res = $mysqli->query($sql) ? 'success' : 'failed';
                  unset($_SESSION['current_user']['cart']); 
                  unset($_SESSION['users'][$_SESSION['current_user']['id']]['cart']); 
                }
              }
            }
          }
        }
        else {     
          foreach($_SESSION['cart'] as $index => $cart_item) {
            $item = $cart_item;
            $sql = "INSERT INTO tbl_order_item_group (order_id, cart_order_num, order_qty) VALUES "."(".$order_id.", ".$index.", ".$cart_item['qty_add'].")";
            if($mysqli->query($sql)) {
              $mysqli_res = $mysqli->query("SELECT LAST_INSERT_ID() AS last_id");
              if($mysqli_res->num_rows > 0) {
                $cart_index_id_inserted = $mysqli_res->fetch_assoc();
                foreach($cart_item['addons'] as $addon_val_id => $addon_val) {
                  $sql = "INSERT INTO tbl_order_item_option (product_id, order_id, addon_value_id, cart_order_num_id) VALUES "."(".$item['id'].", ".$order_id.", ".$addon_val_id.", ".$cart_index_id_inserted['last_id'].")";
                  $res = $mysqli->query($sql) ? 'success' : 'failed';
                  unset($_SESSION['cart']); 
                  unset($_SESSION['guest']);
                }
              }
            }
          }
        }
      }
    }
    $mysqli->close();
    return $res;
  }
?>