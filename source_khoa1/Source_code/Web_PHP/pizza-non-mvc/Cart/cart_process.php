<?php 
  if(session_id() === '') session_start();
  include "../config/dbconnect.php";
  $product_id = isset($_GET["id"]) && !empty(trim($_GET["id"])) ? (Int)$_GET["id"] : 0;
  $action = isset($_GET["action"]) && !empty(trim($_GET["action"])) ? trim($_GET["action"]) : 'add';

  switch($action) {
    case 'add': {
      $qty_add = isset($_POST["prod-qty"]) && !empty(trim($_POST["prod-qty"])) ? (Int)$_POST["prod-qty"] : 1;
      $add_options = array();
      $total_options_price = 0; 
      $num = 1; 
      while(isset($_POST['attrs'.$num])) {
        $add_options_tmp = explode("-", $_POST['attrs'.$num]);
        $total_options_price += (Int)$add_options_tmp[1];
        $add_options[$add_options_tmp[0]] = [$add_options_tmp[2], $add_options_tmp[1]];
        $num++;
      }
      $sql = "SELECT image, product_name, price FROM tbl_product WHERE id=?";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("i", $id); 
        $id = $product_id;
        if($statement->execute()) {
          $mysqli_res = $statement->get_result(); 
          if($mysqli_res->num_rows > 0) {
            $product = $mysqli_res->fetch_object(); 
            $cart_item = [
              "id" => $product_id,
              "image" => $product->image,
              "product_name" => $product->product_name, 
              "addons" => $add_options,
              "price" => $product->price + $total_options_price,
              "qty_add" => $qty_add
            ];
            if(isset($_SESSION['current_user'])) {
              $_SESSION['current_user']['cart'][] = $cart_item;
              $_SESSION['users'][$_SESSION['current_user']['id']]['cart'][] = $cart_item;
            }
            else 
              $_SESSION['cart'][] = $cart_item;
          }
        }
      }
      $statement->close();
      header("location: ../ProductDetail/product_detail.php?id=$product_id&add=1");
      break;
    }
    case 'update': {
      if(strtoupper($_SERVER["REQUEST_METHOD"]) == "POST") {
        foreach($_POST as $k => $v) {
          if(isset($_POST[$k])) {
            if(isset($_SESSION['current_user']))
              $_SESSION['current_user']['cart'][$k]['qty_add'] = $v;
            else
              $_SESSION['cart'][$k]["qty_add"] = $v; 
          }
        }
      }
      header("location: ../Cart/cart.php?resp=updated");
      break;
    }
    case 'delete': {
      if(isset($_GET["idx"])) {
        if(isset($_SESSION['current_user']))
          unset($_SESSION['current_user']['cart'][$_GET["idx"]]);
        else 
          unset($_SESSION['cart'][$_GET["idx"]]);
      }
      header("location: ../Cart/cart.php");
      break;
    }
    default: {
      break;
    }
  }
?>