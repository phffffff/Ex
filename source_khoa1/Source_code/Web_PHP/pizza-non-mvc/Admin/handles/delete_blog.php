<?php
  if(isset($_GET['blog_id']) && !empty(trim($_GET['blog_id']))) {
    $blog_id = (Int)(trim($_GET['blog_id']));
    if(is_int($blog_id)) {
      require_once("../../config/dbconnect.php");
      $sql = "DELETE FROM tbl_news WHERE id=?";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("i", $id_param);
        $id_param = $blog_id;
        if($statement->execute()) {
          $statement->close();
          $mysqli->close();
          header('location: ../html/blog.php?deleted=success');
        }
        else {
          $statement->close();
          $mysqli->close();
          header('location: ../html/blog.php?deleted=failed');
        }
      }
    } 
  }
?>