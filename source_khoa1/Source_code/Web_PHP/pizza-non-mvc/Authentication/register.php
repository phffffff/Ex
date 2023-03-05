<?php 

  include "../config/dbconnect.php";
 
  // if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"])))

  $email = $password = $confirm_password = "";
  $email_err = $password_err = $confirm_password_err = "";
   
  if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
    // Validate email
    if(empty(trim($_POST["email"]))) $email_err = "Vui lòng điền email.";
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $email_err = "Email không hợp lệ";
    else {
      $sql = "SELECT tbl_customer.id AS customer_id FROM tbl_customer INNER JOIN tbl_user_type ON tbl_customer.user_type_id = tbl_user_type.id AND email = ? AND user_type = ?";    
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("ss", $param_email, $param_user_type);     
        $param_email = trim($_POST["email"]);   
        $param_user_type = 'Customer';
        if($statement->execute()) {
          $statement->store_result();
          if($statement->num_rows == 1) 
            $email_err = "Email đã tồn tại.";
          else
            $email = trim($_POST["email"]);
        } 
        else
          echo "Có lỗi trong quá trình xử lý";
        $statement->close();
      }
    }  
    if(empty(trim($_POST["password"]))) $password_err = "Vui lòng nhập mật khẩu.";     
    elseif(strlen(trim($_POST["password"])) < 10) $password_err = "Mật khẩu tối thiểu cần 10 ký tự.";
    else $password = trim($_POST["password"]);
      
    if(empty(trim($_POST["confrm-password"]))) $confirm_password_err = "Vui lòng nhập lại mật khẩu.";     
    else {
      $confirm_password = trim($_POST["confrm-password"]);
      if(empty($password_err) && ($password != $confirm_password))
        $confirm_password_err = "Mật khẩu không trùng khớp.";
    }
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
      $sql = "INSERT INTO tbl_customer (user_type_id, first_name, last_name, country, street_address, city, phone, email, pwd) VALUES (2,NULL,NULL,NULL,NULL,NULL,NULL,?,?)";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("ss", $param_email, $param_password);
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT); 
        if($statement->execute())
          header("location: authen_form.php?signup=success");
        else
          echo "Có lỗi trong quá trình xử lý.";
        $statement->close();
      }
    }
    $mysqli->close();
  }
?>