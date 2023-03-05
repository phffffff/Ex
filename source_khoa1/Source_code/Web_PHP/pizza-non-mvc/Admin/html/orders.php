<?php require_once 'header.php' ?>
<div class="main-content">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row m-t-30">
        <div class="col-md-12">
          <!-- DATA TABLE-->
          <div class="table-responsive m-b-40">
            <div class="d-flex justify-content-between">
              <div class="table-data__tool-left pb-3">
                <div class="rs-select2--light rs-select2--sm pr-3">
                  <select class="js-select2" name="time">
                    <option selected="selected">Today</option>
                    <option value="">3 Days</option>
                    <option value="">1 Week</option>
                  </select>
                  <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--dark rs-select2--sm
                            rs-select2--dark2">
                  <select class="js-select2" name="type">
                    <option selected="selected">Export</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                  </select>
                  <div class="dropDownSelect2"></div>
                </div>
              </div>
              <div class="table-data__tool-right pb-3">
                <form class="form-header" action="" method="POST">
                  <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                  <button class="au-btn--submit" type="submit">
                    <i class="zmdi zmdi-search"></i>
                  </button>
                </form>
              </div>
            </div>
            <table class="table table-borderless table-data3">
              <thead>
                <tr>
                  <th>Mã Order</th>
                  <th>Khách hàng</th>
                  <th>Thanh toán</th>
                  <th>Ngày đặt hàng</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                include "../../config/dbconnect.php"; 
                $sql 
                = "SELECT 
                    tbl_order.id AS order_id, 
                    first_name, 
                    last_name,
                    payment_method,
                    order_date,
                    state
                  FROM tbl_order, tbl_customer, tbl_payment_method, tbl_order_state
                  WHERE 
                    tbl_order.customer_id = tbl_customer.id AND
                    tbl_order.payment_method_id = tbl_payment_method.id AND
                    tbl_order.order_state_id = tbl_order_state.id"; 
                if($mysqli_res = $mysqli->query($sql)): 
                  if($mysqli_res->num_rows > 0): 
                    while ($order = $mysqli_res->fetch_object()): ?>
                      <tr>
                        <td><?= $order->order_id ?></td>
                        <td><?= $order->first_name." ".$order->last_name ?></td>
                        <td><?= $order->payment_method ?></td>
                        <td><?= $order->order_date ?></td>
                        <td><?= $order->state ?></td>
                        <td>
                          <div class="table-data-feature">
                            <a href="detail-order.php?order_id=<?= $order->order_id ?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                              <i class="zmdi zmdi-edit"></i>
                            </a>
                            <a href="../handles/delete_order.php?order_id=<?= $order->order_id ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                              <i class="zmdi zmdi-delete"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php endwhile ?>
                  <?php endif ?>
                <?php endif ?>
                <?php $mysqli->close(); ?>
              </tbody>
            </table>
          </div>
          <!-- END DATA TABLE-->
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once 'footer.php' ?>