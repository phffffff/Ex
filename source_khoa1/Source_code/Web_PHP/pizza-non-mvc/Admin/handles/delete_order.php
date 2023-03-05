<?php 
  $order_id = isset($_GET['order_id']) && !empty(trim($_GET['order_id'])) && strlen(trim($_GET['order_id'])) <= 14 ? $_GET['order_id'] : 0;
  if($order_id != 0) {
    include "../../config/dbconnect.php";
    $sql = "SELECT order_state_id FROM tbl_order WHERE id=?";
    if($statement = $mysqli->prepare($sql)) {
      $statement->bind_param("s", $order_id_param);
      $order_id_param = $order_id;
      if($statement->execute()) {
        $mysqli_res = $statement->get_result();
        if($mysqli_res->num_rows == 1) {
          $order = $mysqli_res->fetch_object();
          $order_state_id = $order->order_state_id;
          if($order_state_id == 1) {
            header('location: ../html/orders.php?deleted=failed');
          }
          else {
            $sql = "DELETE FROM tbl_order WHERE id='".$order_id."'";
            if($mysqli->query($sql)) {
              header('location: ../html/orders.php?deleted=success');
            }
            else {
              header('location: ../html/orders.php?deleted=failed');
            }
          }
        }
        else {
          echo "No records found";
        }
      }
      else {
        echo "Lấy order_state_id không thành công";
      }
    }
  }
?>