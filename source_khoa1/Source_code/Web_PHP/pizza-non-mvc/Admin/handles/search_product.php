<?php
  if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST'):
    $input_err = "";
    if(isset($_POST['search']) && !empty(trim($_POST['search']))) {
      $input = trim($_POST['search']); 
    }
    else {
      $input_err = "<script>alert('input khong hop le')</script>";
      echo $input_err;
    }
    if(empty($input_err)):
      require_once("../../config/dbconnect.php");
      $sql = "SELECT tbl_product.id AS product_id, image, product_name, price, category_name FROM tbl_product JOIN tbl_category ON tbl_product.category_id = tbl_category.id AND product_name=?";
      if($statement = $mysqli->prepare($sql)):
        $statement->bind_param("s", $product_name_param);
        $product_name_param = $input; 
        if($statement->execute()):
          $mysqli_res = $statement->get_reuslt();
          if($mysqli_res->num_rows > 0):
            while ($product = $mysqli_res->fetch_object()): ?>           
              <tr class="tr-shadow">
                <td><?= $product->product_id ?></td>
                <td><img style="width: 60px; height: 60px;" src="<?= $product->image ?>"></td>
                <td class="desc"><?= $product->product_name ?></td>
                <td><?= $product->category_name ?></td>
                <td><?= number_format($product->price) ?>đ</td>
                <td>
                  <div class="table-data-feature">
                    <a href="detail-product.php?product_id=<?= $product->product_id ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                      <i class="zmdi zmdi-edit"></i>
                    </a>
                    <a href="../handles/delete_product.php?product_id=<?= $product->product_id ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                      <i class="zmdi zmdi-delete"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr class="spacer"></tr>
            <?php endwhile ?>
          <?php endif ?>
        <?php endif ?>
      <?php endif ?>
    <?php endif ?>
  <?php endif ?>
