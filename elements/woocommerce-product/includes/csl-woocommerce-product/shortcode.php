<?php
  if(!$product_id){
    return '';
  }

  $handle = 'cs-powerpack';

  $product = wc_get_product($product_id);

  $product_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' )[0];
?>

<div class="cspp-woocommerce-product">
<?php
  if(!!$product):
    if( 'top' === $product_info_position ):
?>
      <div class="cspp-woocommerce-product-info">
        <a href="<?=$product->get_permalink()?>" style="text-decoration: none">
          <span class="cspp-product-name" style="font-size:<?=$product_name_font_size?>; color: <?=$product_name_color?>">
            <?= $product->get_name() ?>
          </span>
          <span class="cspp-product-price" style="float: right; font-size:<?=$product_price_font_size?>; color: <?=$product_price_color?>">
            <?= $product->get_price_html() ?>
          </span>
        </a>
      </div>
<?php
    endif;
?>
    <div class="cspp-woocommerce-product-img" style="
      width: 100%;
      height: <?=$product_image_height?>;
      background-image: url('<?=$product_image_url?>');
      background-size: cover;
    ">
    </div>

<?php
  if( 'bottom' === $product_info_position ):
?>
  <div class="cspp-woocommerce-product-info">
    <a href="<?=$product->get_permalink()?>" style="text-decoration: none">
      <span class="cspp-product-name" style="font-size:<?=$product_name_font_size?>; color: <?=$product_name_color?>">
        <?= $product->get_name() ?>
      </span>
      <span class="cspp-product-price" style="float: right; font-size:<?=$product_price_font_size?>; color: <?=$product_price_color?>">
        <?= $product->get_price_html() ?>
      </span>
    </a>
  </div>
<?php
  endif;

  if( $display_product_short_desc ):
?>
  <div class="cspp-woocommerce-product-desc" style="font-size:<?=$product_short_desc_font_size?>; color:<?=$product_short_desc_color?>">
    <?=$product->get_short_description()?>
  </div>
<?php
  endif;

  endif; //end if(!!$product)
?>
</div>
