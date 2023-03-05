<?php 
  require_once 'header.php';
  $product_id = 0; 
  if(isset($_GET['product_id']) && !empty(trim($_GET['product_id']))) {
    $product_id = (Int)(trim($_GET['product_id']));
    if(is_int($product_id)) {
      include "../../config/dbconnect.php";
      $sql = "SELECT category_id, tbl_product.image, product_name, price, descp FROM tbl_product JOIN tbl_category ON tbl_product.category_id = tbl_category.id AND tbl_product.id=?";
      if($statement = $mysqli->prepare($sql)) {
        $statement->bind_param("i", $product_id_param); 
        $product_id_param = $product_id; 
        if($statement->execute()) {
          $mysqli_res = $statement->get_result();
          if($mysqli_res->num_rows > 0) $product = $mysqli_res->fetch_object();
        }
      }
    }
  }
?>
<form class="main-content" action="../handles/add_product.php" method="POST">
  <?php if((isset($_GET['add']) && strtoupper(trim($_GET['add'])) === 'SUCCESS') || (isset($_GET['update']) && strtoupper(trim($_GET['update'])) === 'SUCCESS')): ?>
  <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per mb-4 ml-5" role="alert">
    <i class="zmdi zmdi-check-circle"></i>
    <span class="content">You successfully read this important alert message.</span>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">
        <i class="zmdi zmdi-close-circle"></i>
      </span>
    </button>
  </div>
  <?php endif ?>
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <img style="height: 443px;" class="card-img-top" src="<?= $product_id != 0 ? $product->image : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1E3Klw6ySQA_Kpqi-QfQzsoAquQHQ1XF9SA&usqp=CAU'?>" alt="Card image cap">
            <?php if(!$product_id): ?>
            <div class="row col-md-12 form-group pt-2">
              <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Thêm ảnh</label>
              </div>
              <div class="col col-md-9">
                <input type="text" id="text-input" name="product_img" placeholder="Text" class="form-control">
              </div>
            </div>
            <?php endif ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card" style="height: 507px;">
            <div class="card-header">Chi tiết sản phẩm</div>
            <div class="card-body">
              <div>
                <div class="form-group has-success">
                  <label for="product_name" class="control-label mb-1">Tên món</label>
                  <input id="cc-name" name="product_name" type="text" value="<?= $product_id != 0 ? $product->product_name : ''?>" class="form-control-lg form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                  <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                </div>
                <div class="form-group">
                  <label for="product_price" class="control-label mb-1">Giá</label>
                  <input id="cc-pament" name="product_price" type="text" value="<?= $product_id != 0 ? $product->price : ''?>" class="form-control-lg form-control" aria-required="true" aria-invalid="false">
                </div>
                <div class="row form-group">
                  <div class="col col-md-12">
                    <label for="selectLg" class=" form-control-label">Danh mục</label>
                  </div>
                  <div class="col-12 col-md-12">
                    <select name="category" id="selectLg" class="form-control-lg form-control">
                    <?php 
                      require_once("../../config/dbconnect.php"); 
                      $sql = "SELECT * FROM tbl_category"; 
                      if($mysqli_res = $mysqli->query($sql)):
                        if($mysqli_res->num_rows > 0):
                          while ($category = $mysqli_res->fetch_object()): ?>
                            <?= $category->id === $product->category_id ? '<option value="'.$category->id.'" selected>'.$category->category_name.'</option>' : '<option value="'.$category->id.'">'.$category->category_name.'</option>' ?>
                          <?php endwhile ?>
                        <?php endif ?>
                      <?php endif ?>
                      <?php $mysqli->close(); ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-lg-12">
          <label for="product_desc" class=" form-control-label">Mô tả về món</label>
        </div>
        <div class="col-12 col-md-12">
          <textarea name="product_desc" id="textarea-input" cols="300" rows="9" placeholder="Content..." class="form-control"><?= $product_id != 0 ? $product->descp : ''?></textarea>
        </div>
      </div>
    </div>
    <div class="col-md-4 pt-5 float-right">
      <button type="submit" class="au-btn au-btn-icon au-btn--green au-btn--block">
        <i class="zmdi zmdi-plus"></i><?= $product_id != 0 ? 'Cập nhật' : 'Thêm vào thực đơn' ?>
      </button>
    </div>
  </div>
</form>
<?php require_once 'footer.php' ?>