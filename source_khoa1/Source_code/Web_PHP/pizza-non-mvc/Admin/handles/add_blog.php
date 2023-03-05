<?php 
  if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    require_once("../../config/dbconnect.php");
    $blog_title_err = $blog_content_err = $blog_img_err = "";
    if(isset($_POST['blog_image']) && !empty(trim($_POST['blog_image']))) {
      $blog_image = trim($_POST['blog_image']); 
    }
    else {
      $blog_img_err = "<script>Ảnh không hợp lệ</script>";
      echo $blog_img_err;
    }
    if(isset($_POST['blog_title']) && !empty(trim($_POST['blog_title']))) {
      $blog_title = trim($_POST['blog_title']); 
    }
    else {
      $blog_title_err = "<script>Tiêu đề bài viết không hợp lệ</script>";
      echo $blog_title_err;
    }
    if(isset($_POST['blog_content']) && !empty(trim($_POST['blog_content']))) {
      $blog_content = trim($_POST['blog_content']);
    }
    else {
      $blog_content_err = "<script>Nội dung không hợp lệ</script>";
      echo $blog_content_err;
    }
    if(empty($blog_title_err) && empty($blog_content_err) && empty($blog_img_err)) {
      $sql = "INSERT INTO tbl_news (image, title, date_post, content) VALUES (?,?,?,?)";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("ssss", $img_param, $title_param, $date_post_param, $content_param); 
        $img_param = $blog_image;
        $title_param = $blog_title;
        $date_post_param = date("Y-m-d");
        $content_param = $blog_content;
        if($statement->execute()) {
          $statement->close();
          $mysqli->close();
          header('location: ../html/add-blog.php?add=success');
        }
        else {
          $statement->close();
          $mysqli->close();
          header('location: ../html/add-blog.php?add=failed');
        }
      }
    }
  }
?>