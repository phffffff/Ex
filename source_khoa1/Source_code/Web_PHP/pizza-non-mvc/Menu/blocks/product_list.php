<?php
  if($products->num_rows > 0):
    while($product = $products->fetch_object()): ?>
      <div class="item">
        <div class="img-item">
          <a href="../ProductDetail/product_detail.php?id=<?= $product->ID ?>">
            <img width="230" height="230" src="<?= $product->image?>" alt="">
            <div class="item-ic-link">
              <img src="https://scontent.fhan3-2.fna.fbcdn.net/v/t1.15752-9/259356616_689097708703118_2836089214408038837_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_ohc=S2yGYBsDhasAX-b2KsF&_nc_ht=scontent.fhan3-2.fna&oh=4dd103664df23d55757974499e384eab&oe=61C9F557">
            </div>
          </a>
        </div>
        <div class="name-item"><p><?= $product->product_name?></p></div>
        <div class="price"><?= number_format($product->min_price)?><sup>đ</sup> - <?= number_format($product->max_price)?><sup>đ</sup></div>
        <div class="btn"><a href="../ProductDetail/product_detail.php?id=<?= $product->ID?>">Lựa chọn</a></div>
      </div>
    <?php endwhile ?>
  <?php endif ?>
<?php ?>