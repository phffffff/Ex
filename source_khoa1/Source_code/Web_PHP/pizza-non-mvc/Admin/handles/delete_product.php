<?php 
  $product_id = isset($_GET['product_id']) && !empty(trim($_GET['product_id'])) ? (Int)$_GET['product_id'] : 0;
  if(is_int($product_id) && $product_id !== 0) {
    require_once("../../config/dbconnect.php");
    // Check if product is already order
    $sql = "SELECT order_id FROM tbl_order_item_option WHERE product_id=?";
    if($statement = $mysqli->prepare($sql)) {
      $statement->bind_param("i", $product_id_param);
      $product_id_param = $product_id;
      if($statement->execute()) {
        $res = $statement->get_result();
        if($res->num_rows > 0) {
          $statement->close();
          $mysqli->close();
          header('location: ../html/product.php?ordering='.$product_id);
        }
        else {
          $sql = "DELETE FROM tbl_product WHERE id=?";
          if($statement->prepare($sql)) {
            $statement->bind_param("i", $product_id_param);
            $product_id_param = $product_id;
            if($statement->execute()) {
              $statement->close();
              $mysqli->close();
              header('location: ../html/product.php?deleted='.$product_id);
            }
          }
        }
      }
    }
  }
  else {
    echo "Vui lòng kiểm tra lại ID sản phẩm";
  }
?>