<?php if(session_id() === '') session_start(); ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@500&display=swap" rel="stylesheet">
<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  * {
    margin: 0; 
    padding: 0; 
    box-sizing: border-box; 
  }
  a {
    text-decoration: none;
  }
  .main {
    display: flex; 
    width: 100%;
    justify-content: center; 
    align-items: center;
    padding: 100px 0px 100px 0px;
  }
  .menu-area {
    display: flex; 
    width: 92%;
    justify-content: center; 
    align-items: center;
  }
  .menu-wrapper {
    display: flex; 
    width: 73rem; 
    height: 100%;
  }
  .menu-left {
    display: flex;
    flex-direction: column;
    flex: 4 0 0px; 
  }
  .right {
    display: flex;
    flex-direction: column;
    flex: 9 0 0px; 
  }
  .menu-left-part {
    background-color: #F5F5F5;
    padding: 15% 15% 18% 15%;
    border-bottom: 2px solid #E4E4E4;
  }
  .menu-left-part h1 {
    font-size: 20px;
    font-weight: 700;
    font-family: 'Graviola Soft W01';
    padding-bottom: 10%;
  } 
  .filter-submit {
    padding: 0.9em 1.6em;
    background-color: #CA0808;
    border-radius: 2.3em;
    letter-spacing: 0.2rem;
    font-weight: 500;
    color: white;
    border: 2px solid #CA0808;
  }
  .filter-submit:hover {
    color: #CA0808;
    border: 2px solid #CA0808;
    background-color: white;
  }
  .list-category {
    padding: 0px 0px 0px 17px;
  }
  .list-category li {
    color: #CA0808;
    padding: 7px 10px 10px 10px;
  }
  .menu-left-part-link {
    color: #2b2b2b;
    display: block;
    float: left;
    padding: 5px 14px 5px 14px;
    font-size: 0.75em;
    letter-spacing: 3px;
    border-radius: 2px;
    background-color: #E9e9e9;
    font-weight: 600;
    margin: 3px;
  }
  .list-category li a:hover {
    background-color: #CA0808;
    color: white;
    transition: 0.3s;
  }
  .list-tag a:hover {
    background-color: #CA0808;
    color: white;
    transition: 0.3s;
  }
  /* .sort-options {
    background-color: #f5f5f5;
    border: none;
    padding: 0.7em 3em 0.7em 1.1em;
    border-radius: 2em;
    background-color: powderblue;
  } */
  .list {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
  }
  .item {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-left: 18px;
    margin-bottom: 40px;
  }
  .img-item {
    position: relative;
  }
  .item-ic-link {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute; 
    transition: 0.2s;
  }
  .item-ic-link img {
    width: 0;
    height: 0;
  }
  .img-item:hover .item-ic-link {
    transform: scale(8, 8);
    border-radius: 200px;
    top: 48%; 
    left: 48%;
    width: 10px;
    height: 10px;  
    background-color: rgb(202,0,0);
  }
  .img-item:hover .item-ic-link img {
    width: 4px;
    height: 4px;
  }
  .name-item {
    padding: 20px 0px 15px 0px;
    font-size: 1.2rem;
    font-family: 'Graviola Soft W01';
  }
  .name-item:hover {
    color: #CA0808;
    transition: 0.5s;
  }
  .price {
    color: #CA0808;
    padding-bottom: 1rem;
    font-size: 16px; 
    font-family: 'Graviola Soft W01';
  }
  .btn {
    margin: 1rem;
  }
  .btn a {
    font-size: 18px;
    text-decoration: none;
    border-radius: 50px;
    padding: 13px 32px 13px 32px;
    color: white;
    background-color: #548c1d;
    border: #548c1d solid 2px;
  }
  .btn a:hover {
    background-color: white;
    color: #548c1d;
    transition: 0.5s;
  }
  .right-top {
    display: flex; 
    height: 60px;
    padding: 0px 22px 0px 22px; 
  }
  .sort-options-wrapper {
    display: flex;
    width: 100%;
    height: 100%;
    justify-content: flex-end;
    align-items: flex-start;
    border-bottom: 1px dashed #e3e3e3;
    padding-bottom: 15px;
  }
  .search-prod-input {
    width: 300px; 
    height: 90%;
    margin-right: 12px;
    border: none;
    border-radius: 6px;
    box-shadow: 0px 1px 5px #E4E4E4;
    background-color: #E4E4E4;
    padding-left: 10px;
    font-size: 15px;
  }
  .search-prod-input:focus {
    border: 3px solid powderblue;
  }
  .search-prod-btn {
    width: 80px; 
    height: 90%;
    background-color: rgb(202, 0, 0);
    border: 2px solid rgb(202, 0, 0);
    border-radius: 6px;
    color: white;
    transition: 0.5s
  }
  .search-prod-btn:hover {
    background-color: white; 
    color: rgb(202, 0, 0);
  }
  .right-center {
    display: flex;
    padding: 40px 22px 40px 22px;
  }
  .right-bottom {
    display: flex;
    justify-content: center;
  }
  .page-btns-wrapper {
    display: flex;
    height: 100%;
    align-items: center;
  }
  .change-page-btn:hover {
    background-color: rgb(202,0,0);
    color: white;
  }
</style>
<div style="width: 100%; height: 0;">
  <?php 
    $mvar = "3"; 
    require_once "../global/short_banner.php";
    $page = isset($_GET["page"]) && !empty(trim($_GET["page"])) ? (Int)($_GET["page"]) : 1;  
    $category_name = isset($_GET["category_name"]) && !empty(trim($_GET["category_name"])) ? $_GET["category_name"] : "all";
    $offset = ($page-1)*6;

    function getTotalPage($category_name) {
      include "../config/dbconnect.php";
      $total_page = 0; 
      if(strtoupper($category_name) !== 'ALL') {
        $sql = "SELECT COUNT(tbl_product.id) AS total_product FROM tbl_product JOIN tbl_category ON tbl_product.category_id = tbl_category.id AND category_name=?";
        if(isset($_POST['search_product']) && !empty(trim($_POST['search_product']))) {
          $sql .= " AND product_name='".htmlspecialchars(trim($_POST['search_product']))."'";
        }
        if($statement = $mysqli->prepare($sql)) {
          $statement->bind_param("s", $category_name_param); 
          $category_name_param = $category_name;
          if($statement->execute()) $mysqli_res = $statement->get_result();
        }
        $statement->close();
      }
      else {
        $sql = "SELECT COUNT(id) AS total_product FROM tbl_product";
        if(isset($_POST['search_product']) && !empty(trim($_POST['search_product']))) {
          $sql .= " WHERE product_name='".htmlspecialchars(trim($_POST['search_product']))."'";
        }
        $mysqli_res = $mysqli->query($sql);
      }
      if($mysqli_res->num_rows > 0) {
        $mysqli_res_obj = $mysqli_res->fetch_object();
        $total_page = $mysqli_res_obj->total_product/6;
      }
      $mysqli->close();
      return $total_page;
    } 

    function getProducts($category_name, $offset) {
      include "../config/dbconnect.php";
      if(strtoupper($category_name) !== 'ALL') {
        $sql 
        = "SELECT tbl_product.id AS ID, product_name, tbl_product.image, price AS min_price, (price + (SELECT MAX(addon_price) FROM tbl_addon_values)) as max_price
           FROM tbl_product JOIN tbl_category ON tbl_product.category_id = tbl_category.id AND
           category_name=?";
        if(isset($_POST['search_product']) && !empty(trim($_POST['search_product']))) {
          $sql .= " AND product_name='".htmlspecialchars(trim($_POST['search_product']))."'";
        }
        $sql .= " LIMIT $offset, 6;";
        if($statement = $mysqli->prepare($sql)) {
          $statement->bind_param("s", $category_name_param); 
          $category_name_param = $category_name;
          if($statement->execute()) $mysqli_res = $statement->get_result();
        }
        $statement->close();
      }
      else {
        $sql 
        = "SELECT tbl_product.id AS ID, product_name, tbl_product.image, price AS min_price, (price + (SELECT MAX(addon_price) FROM tbl_addon_values)) as max_price
           FROM tbl_product, tbl_category
           WHERE tbl_product.category_id = tbl_category.id";
        if(isset($_POST['search_product']) && !empty(trim($_POST['search_product']))) {
          $sql .= " AND product_name='".htmlspecialchars(trim($_POST['search_product']))."'";
        }
        $sql .= " LIMIT $offset, 6;";
        $mysqli_res = $mysqli->query($sql);
      }
      $mysqli->close();
      return $mysqli_res; 
    }

    $page_amount = getTotalPage($category_name);
    $products = getProducts($category_name, $offset);

  ?>
  <main class="main">
    <div class="menu-area">
      <div class="menu-wrapper">
        <div class="menu-left">
          <div class="menu-left-part">
            <h1>LỌC THEO GIÁ</h1>
            <input type="range" name="volume" min="100000" max="300000" step="10000"><br><br><br>
            <a href="#" class="filter-submit">FILTER</a>
          </div>
          <div class="menu-left-part">
            <h1>DANH MỤC THỰC ĐƠN</h1>
            <ul class="list-category">
            <?php 
              include "../config/dbconnect.php";
              $sql = "SELECT category_name FROM tbl_category";
              if($mysqli_res = $mysqli->query($sql)):
                if($mysqli_res->num_rows > 0):
                  while ($category = $mysqli_res->fetch_object()): ?>
                    <li><a class="menu-left-part-link" href="menu.php?category_name=<?= strtolower($category->category_name) ?>&page=<?= $page?>"><?= strtoupper($category->category_name) ?></a></li>
                  <?php endwhile ?>
                <?php endif ?>
              <?php endif ?>
              <?php $mysqli->close(); ?>
            </ul>
          </div>
          <div class="menu-left-part">
            <h1>LIÊN KẾT</h1>
            <div class="list-tag">
              <a class="menu-left-part-link" href="#">DRINKS</a>
              <a class="menu-left-part-link" href="#">BEVERAGES</a>
              <a class="menu-left-part-link" href="#">DINING</a>
              <a class="menu-left-part-link" href="#">EVENTS</a>
              <a class="menu-left-part-link" href="#">HOT</a>
              <a class="menu-left-part-link" href="#">KIDS MENU</a>
              <a class="menu-left-part-link" href="#">PIZZA</a>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="right-top">
            <form class="sort-options-wrapper" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
              <input class="search-prod-input" type="text" name="search_product" placeholer="Nhập tên sản phẩm">
              <input class="search-prod-btn" type="submit" value="Tìm kiếm">
            </form>
          </div>
          <div class="right-center">
            <div class="list">
              <?php require_once "blocks/product_list.php"; ?>
            </div>
          </div>
          <div class="right-bottom">
            <div class="page-btns-wrapper">
            <?php for($i = 1; $i <= $page_amount; $i++): ?>
              <a href="<?= strtoupper($category_name) !== 'ALL' ? 'menu.php?category_name='.$category_name.'&page='.$i : 'menu.php?page='.$i ?>" 
                 class="change-page-btn"
                 style="
                   display: flex;
                   justify-content: center;
                   align-items: center;
                   width: 50px;
                   height: 50px;
                   border: none;
                   border-radius: 50px;
                   margin-left: 18px;
                   <?php 
                    if($i === $page) {
                      echo 'background-color: rgb(202,0,0);';
                      echo 'color: white;';
                    }
                    else { 
                      echo 'background-color: #E4E4E4;';
                      echo 'color: gray;';
                    }
                   ?>;
                   transition: 0.5s;
                 "><?= $i ?></a>
            <?php endfor ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php require_once("../global/footer.php"); ?>
</div>