<div class="product-container">
<div class="product-main">
<div class="row content-row mb-0">



	<div class="product-gallery large-<?php echo flatsome_option('product_image_width'); ?> col">
<?php 
$_product = wc_get_product( get_the_ID() ); // GET meta tour
$giasale_format = number_format_i18n( $_product->get_sale_price() );
$giagoc_format = number_format_i18n( $_product->get_regular_price() );
?>
	<div class="dat-tour row">
		<h1 class="product-title entry-title"> <?php the_title(); ?></h1>
		<ul class="thong-tin-dau">
			<li class=" trai">
				<p>Thời gian: <?php echo get_post_meta(get_the_ID(),'wpcf-ngay-dem',true); ?></p>
			</li>
			<li class=" phai"><p>Các Tháng Có Tour: Tháng <?php echo get_post_meta(get_the_ID(),'wpcf-cac-thang-co-tour',true); ?></p></li>
			</ul>
		<div class="clearfix"></div>
		<ul class="thong-tin-sau">
			<li class="trai"><p class="gia-giam"><span class="tien"><?php echo $giasale_format; ?></span><span> đồng</span></p><p class="gia-goc">Giá gốc: <?php echo $giagoc_format; ?> <span> đồng</span></p></li>
			<li class="phai"><p class="ngay-kh">Khởi hành ngày: <?php echo date('d-m-Y',get_post_meta(get_the_ID(),'wpcf-ngay-tour',true)); ?></p><p class="button-dat-tour"><a href="#contact_form_pop" class="fancybox fancy-single">Nhận Tư Vấn</a></p>
			<!-- Trigger/Open The Modal -->
			<div style="display:none" class="fancybox-hidden">
			    <div id="contact_form_pop">
			        <?php echo do_shortcode('[contact-form-7 id="399" title="Form tư vấn"]'); ?>
			    </div>
			</div>

			</li>
		</ul>
	</div><br>
	<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
	?>
	
	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>
	</div>

	<div class="product-info summary col-fit col entry-summary <?php flatsome_product_summary_classes();?>">
		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
		<?php 
			
			$contenttour = apply_filters( 'the_content', get_the_content() );
			
		 	$khoihanh = date('d-m-Y',get_post_meta(get_the_ID(),'wpcf-ngay-tour',true));
		 	$thoigian = get_post_meta(get_the_ID(),'wpcf-ngay-dem',true);
		 ?>
		<?php echo do_shortcode('[tabgroup]
    [tab title="Chương trình Tour"]'.$contenttour.'[/tab]
    [tab title="thông tin"]
    	<div class="thongtintour">
    		<p><i class="fa fa-paper-plane" aria-hidden="true"></i> Ngày khởi hành: '.$khoihanh.'</p>
    		<p><i class="fa fa-history" aria-hidden="true"></i> Thời gian: '.$thoigian.'</p>
    	</div>
    [/tab]
    [tab title="lưu ý"] <div style="font-weight: 300;
    font-size: 20px;
    margin-bottom: 20px;
    color: #2d9ad9;">Lưu ý</div>
    <p>- Trong trường hợp chỉ có 1 khách người lớn đi với 1 trẻ em dưới 11 tuổi (không có chế độ giường riêng), quý khách vui lòng thanh tiền tour cho bé như giá tour người lớn để bé có chế độ giường riêng.</p>
<p>- Đối với khách hàng trên 75 tuổi: phải có giấy chứng nhận sức khỏe của bác sĩ và phải có người thân dưới 60 tuổi (đầy đủ sức khỏe) đi kèm.</p>
<p>- Quý khách vui lòng tuân thủ đúng giờ giấc và sắp xếp chương trình mà Hướng dẫn viên đã thông báo và đề ra trên tour để hoàn tất đầy đủ chương trình tham quan bên công ty Việt Sun Travel đưa ra.</p>
<p><b>- Khi đăng ký tour du lịch, quý khách vui lòng đọc kỹ chương trình, giá tour, các điều khoản bao gồm cũng như không bao gồm, các điều kiện hủy tour... Trong trường hợp quý khách không trực tiếp đến đăng ký tour mà nhờ người thân hoặc bạn bè đến đăng ký, quý khách vui lòng tìm hiểu kỹ chương trình từ người đăng ký cho mình. Việt Sun Travel sẽ không chịu trách nhiệm bồi thường những chi phí phát sinh khi quý khách không tìm hiểu kỹ điều kiện đăng ký, các mục lưu ý và chương trình tour du lịch.</b></p>
[/tab]
[/tabgroup]'); ?>
	</div><!-- .summary -->

	<div id="product-sidebar" class="mfp-hide">
		<div class="sidebar-inner">
			<?php
				do_action('flatsome_before_product_sidebar');
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				if (is_active_sidebar( 'product-sidebar' ) ) {
					dynamic_sidebar('product-sidebar');
				} else if(is_active_sidebar( 'shop-sidebar' )) {
					dynamic_sidebar('shop-sidebar');
				}
			?>
		</div><!-- .sidebar-inner -->
	</div>

</div><!-- .row -->
</div><!-- .product-main -->

<div class="product-footer">
	<div class="container">
		<?php
			/**
			 * woocommerce_after_single_product_summary hook
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div><!-- container -->
</div><!-- product-footer -->
</div><!-- .product-container -->
