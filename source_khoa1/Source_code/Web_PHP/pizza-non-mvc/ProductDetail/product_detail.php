<div style="width: 100%; height: 0;">
  <?php 
    $mvar = "1"; 
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
      include "../config/dbconnect.php";
      $sql = 
        "SELECT 
          product_name, 
          tbl_product.image AS product_image, 
          price as min_price, 
         (price + (SELECT MAX(addon_price) FROM tbl_addon_values)) as max_price, 
          
          tbl_addon.id as addon_id,
          addon_name, 
          tbl_addon_values.id as addon_value_id,
          addon_val,
          addon_price,
          category_name, 
          descp
        FROM tbl_product, tbl_category, tbl_addon_category, tbl_addon, tbl_addon_values 
        WHERE 
          tbl_product.category_id = tbl_category.id AND 
          tbl_category.id = tbl_addon_category.category_id AND 
          tbl_addon_values.addon_id = tbl_addon.id AND 
          tbl_addon.id = tbl_addon_category.addon_id AND 
          tbl_product.id = ?";
      if($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $product_id);
        $product_id = trim($_GET["id"]);
        if($stmt->execute()) {
          $res = $stmt->get_result();   
          if($res->num_rows > 0) { 
            $product_name = $image = $min_price = $max_price = $intro = $category_name = $description = '';
            $tmp = 0;
            $addons = array();
            $prevent_loop = 0; 
            while ($prod = $res->fetch_object()) {
              if($prevent_loop != 1) {
                $product_name = $prod->product_name; 
                $image = $prod->product_image; 
                $min_price = $prod->min_price; 
                $max_price = $prod->max_price; 
                $category_name = $prod->category_name; 
                $description = $prod->descp;
                $prevent_loop = 1;
              } 
              if($tmp != $prod->addon_id) { 
                $tmp = $prod->addon_id;
                $addons[$tmp] = array();
              }
              $addons[$tmp]['addon_name'] = $prod->addon_name;
              $addons[$tmp]['addon_values'][$prod->addon_value_id]['addon_value_name'] = $prod->addon_val;
              $addons[$tmp]['addon_values'][$prod->addon_value_id]['addon_value_price'] = $prod->addon_price;
            } 
          }     
          else {
            echo "Error.";
            exit();
          }
        }    
      } else echo "Vui lòng thử lại.";   
      $stmt->close();  
    } 
    else {
      echo "Oops!. Error";  
      exit();
    }
    require_once "../global/short_banner.php";
    require_once "blocks/product_main_info.php";
    require_once "blocks/product_more_info.php";
    require_once "blocks/related.php";
    include_once("../global/footer.php");
  ?>
</div>