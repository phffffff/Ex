<style>
  @import url(//db.onlinewebfonts.com/c/3e8c66479e166f48e44525609aebd682?family=Graviola+Soft+W01);
  .categories {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 700px; 
  }
  .categories-wrapper {
    display: flex;
    flex-direction: column;
    width: 65rem; 
    height: 500px;
  }
  .categories-title {
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 2 0 0px;
  }
  .categories-title-txt {
    font-family: 'Graviola Soft W01';
    font-size: 36px;
    color: rgb(49, 49, 49);;
  }
  .categories-list {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex: 4 0 0px; 
  }
  .categories-item {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: 220px;
    height: 200px;
    border-radius: 10px;
    box-shadow: 0px 2px 6px rgb(201, 201, 201);
    transition: 0.2s;
    text-decoration: none;
  }
  .categories-item:hover {
    background-color: rgb(202,0,0);
  }
  .categories-item:hover p {
    color: white; 
  }
  .categories-item img {
    width: 100px;
    height: 100px; 
  }
  .categories-item p {
    font-weight: bold;
    font-size: 24px;
    font-family: 'Graviola Soft W01';
    color: rgb(49, 49, 49);
  }
  .categories-view-menu {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    flex: 1 0 0px; 
  }
  .categories-menu-btn {
    padding: 15px 25px 15px 25px;
    border: 2px solid rgb(202,0,0);
    border-radius: 50px; 
    background-color: rgb(202, 0, 0);
    color: white;
    text-decoration: none;
    font-family: 'Graviola Soft W01';
    transition: 0.3s; 
  }
  .categories-menu-btn:hover {
    background-color: white; 
    color: rgb(202,0,0);
  }
</style>
<section class="categories">
  <div class="categories-wrapper">
    <div class="categories-title">
      <p class="categories-title-txt">Danh mục thực đơn</p>
    </div>
    <div class="categories-list">
    <?php 
      $sql = "SELECT * FROM tbl_category"; 
      if($mysqli_res = $mysqli->query($sql)): 
        if($mysqli_res->num_rows > 0): 
          while($category = $mysqli_res->fetch_object()): ?>
            <a href="../Menu/menu.php?category_name=<?= $category->category_name ?>" class="categories-item">
              <img src="<?= $category->image ?>">
              <p><?= $category->category_name ?></p>
            </a>
          <?php endwhile ?>
        <?php endif ?>
      <?php endif ?>
    </div>
    <div class="categories-view-menu">
      <a href="../Menu/menu.php" class="categories-menu-btn">EXPLORE MENU</a>
    </div>
  </div>
</section>