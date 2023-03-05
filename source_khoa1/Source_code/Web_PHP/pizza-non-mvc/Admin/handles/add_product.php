<?php 
  require_once("../../config/dbconnect.php");
  if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

    $product_name_err = $price_err = $image_err = "";

    if(isset($_POST['product_name']) && !empty(trim($_POST['product_name'])) && strlen(trim($_POST['product_name'])) <= 20) 
      $product_name = trim($_POST['product_name']);
    else {
      $product_name_err = "<script>Tên món không hợp lệ</script>";
      echo $product_name_err;
    }

    if(isset($_POST['product_price']) && !empty(trim($_POST['product_price'])) && is_int((Int)($_POST['product_price']))) 
      $product_price = trim($_POST['product_price']);
    else {
      $product_price_err = "<script>Giá tiền không hợp lệ</script>";
      echo $product_price_err;
    }

    if(isset($_POST['product_img']) && !empty(trim($_POST['product_img']))) {
      $product_img = trim($_POST['product_img']);
    }
    else {
      $image_err = "<script>Link ảnh không hợp lệ</script>";
      echo $image_err;
    }

    if(isset($_POST['category'])) $category_id = $_POST['category'];

    if(empty($product_name_err) && empty($price_err) && empty($image_err)) {
      $sql = "INSERT INTO tbl_product (category_id, image, product_name, price, descp, intro) VALUES (?,?,?,?,?,NULL)";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("issis", $category_id_param, $image_param, $product_name_param, $price_param, $desc_param); 
        $category_id_param = $category_id;
        $image_param = $product_img;
        $product_name_param = $product_name;
        $price_param = $product_price;
        $desc_param = trim($_POST['product_desc']); 
        if($statement->execute()) {
          $statement->close();
          $mysqli->close();
          header('location: ../html/detail-product.php?add=success');
        }
        else 
          header('location: ../html/detail-product.php?add=failed');
      }
    }
  }
?>