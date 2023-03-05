<?php require_once 'header.php' ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <?php if(isset($_GET['ordering']) || isset($_GET['deleted'])): ?>
    <div class="alert au-alert-<?= isset($_GET['ordering']) ? 'success' : 'danger'?> alert-dismissible fade show au-alert au-alert--70per mb-4 ml-1" role="alert">
      <i class="zmdi zmdi-check-circle"></i>
      <span class="content"><?= isset($_GET['ordering']) ? 'Sản phẩm mã '.$_GET['ordering'].' đang có giao dịch. Không thể xóa!' : 'Xóa thành công sản phẩm mã '.$_GET['deleted'] ?></span>
      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
          <i class="zmdi zmdi-close-circle"></i>
        </span>
      </button>
    </div>
    <?php unset($_GET); ?>
    <?php endif ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="title-5 m-b-35">Danh sách thực đơn hiện tại</h3>
        <div class="table-data__tool">
          <div class="table-data__tool-right">
            <a href="detail-product.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
              <i class="zmdi zmdi-plus"></i>Thêm món
            </a>
          </div>
          <form class="form-header" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input class="au-input au-input--xl" type="text" name="search" placeholder="Nhập tên sản phẩm" />
            <button class="au-btn--submit" type="submit">
              <i class="zmdi zmdi-search"></i>
            </button>
          </form>
        </div>
        <div class="table-responsive table-responsive-data2">
          <table class="table table-data2">
            <thead>
              <tr>
                <th>Mã sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Tên món</th>
                <th>Danh mục</th>
                <th>Giá hiện tại</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php 
              require_once("../../config/dbconnect.php");
              $sql = "SELECT tbl_product.id AS product_id, tbl_product.image, product_name, price, category_name FROM tbl_product JOIN tbl_category ON tbl_product.category_id = tbl_category.id";
              if(isset($_POST['search']) && !empty(trim($_POST['search']))) {
                $sql .= " AND product_name='".htmlspecialchars(trim($_POST['search']))."'";
              }
              if($mysqli_res = $mysqli->query($sql)): 
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
            <?php $mysqli->close(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'footer.php' ?>