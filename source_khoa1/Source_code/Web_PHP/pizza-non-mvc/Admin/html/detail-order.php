<?php require_once 'header.php' ?>
<?php 
  $order_id = isset($_GET['order_id']) && !empty(trim($_GET['order_id'])) && strlen(trim($_GET['order_id'])) <= 14 ? $_GET['order_id'] : 0;
  if($order_id != 0) {
    include "../../config/dbconnect.php";
    $sql = "";
  }
?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="d-flex justify-content-end pb-3">
      <div class="row form-group" style="margin-right: 50px;">
        <div class="col col-lg-8">
          <label class=" form-control-label" style="margin-right: -30px;">Trạng thái Order: &nbsp;</label>
        </div>
        <div class="col-3 col-lg-4">
          <p class="form-control-static" style="margin-left: -10px;">Da tiep nhan</p>
        </div>
      </div>
      <div class="table-data__tool-right">
        <button class="btn btn-danger">Hủy đơn</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <img class="card-img-top" src="data:image/png;base64,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" alt="Card image cap">
      </div>
      <div class="col-md-10">
        <div class="card">
          <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="row">
                <div class="col-md-6">
                  <div class="row form-group">
                    <div class="col col-lg-4">
                      <label class=" form-control-label">Mã khách hàng</label>
                    </div>
                    <div class="col-3 col-lg-7 mr-4">
                      <p class="form-control-static">qưeweqweqweqweqweqw</p>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-lg-4">
                      <label class=" form-control-label">Tên khách hàng</label>
                    </div>
                    <div class="col-3 col-lg-7">
                      <p class="form-control-static">Username</p>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-lg-4">
                      <label class=" form-control-label">Số điện thoại</label>
                    </div>
                    <div class="col-3 col-lg-7">
                      <p class="form-control-static">Username</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row form-group">
                    <div class="col col-lg-4">
                      <label class=" form-control-label">Địa chỉ giao</label>
                    </div>
                    <div class="col-3 col-lg-7">
                      <p class="form-control-static">dsfdsffdsfdsdsdsfdsdsf</p>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col col-lg-4">
                      <label class=" form-control-label">Email</label>
                    </div>
                    <div class="col-3 col-lg-7">
                      <p class="form-control-static">Username</p>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row pt-5">
      <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-30">
          <table class="table table-borderless table-striped table-earning">
            <thead>
              <tr>
                <th>Mã sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Tên món</th>
                <th>Tùy chọn</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2018-09-29 05:57</td>
                <td>100398</td>
                <td>iPhone X 64Gb Grey</td>
                <td>$999.00</td>
                <td>1</td>
                <td>$999.00</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once 'footer.php' ?>