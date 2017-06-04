<div <?= $id ?> class="<?=$class . ' ' . $orientation ?>" <?=$style?> <?=$data?> data-fade="<?=$fade?>">
  <?php
  if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();

    if ( $no_image == 'true' ) {
      $image_output       = '';
      $image_output_class = 'no-image';
    } else {
      $image              = wp_get_attachment_image_src( get_post_thumbnail_id(), 'entry-cropped' );
      $bg_image           = ( $image[0] != '' ) ? ' style="background-image: url(' . $image[0] . ');"' : '';
      $image_output       = '<div class="x-recent-posts-img"' . $bg_image . '></div>';
      $image_output_class = 'with-image';
    }
  ?>

  <a class="x-recent-post <?=$count . ' ' . $image_output_class ?>"
    href="<?=get_permalink( get_the_ID() )?>"
    title="<?=esc_attr( sprintf( __( 'Permalink to: "%s"', $handle ), the_title_attribute( 'echo=0' ) ) )?>">
      <article id="post-' . get_the_ID() . '" class="' . implode( ' ', get_post_class() ) . '">
        <div class="entry-wrap">
          <?= $image_output ?>

          <div class="x-recent-posts-content">
            <h3 class="h-recent-posts"><?=get_the_title()?></h3>
            <?php
              if($include_excerpt):
            ?>
              <div class="x-recent-posts-excerpt">
                <?=get_the_excerpt()?>
              </div>
            <?php
              endif;
            ?>
            <?php
              if($include_post_meta):
            ?>
              <div class="x-recent-posts-meta">
                <div class="x-recent-posts-author"><?= get_the_author() ?></div>
                <div class="x-recent-posts-date"><?= get_the_date() ?></div>
                <?php
                  $posttags = get_the_tags();
                  if ($posttags):
                ?>
                    <div class="x-recent-posts-tags">
                      Tags:
                        <?php
                          foreach($posttags as $tag):
                        ?>
                            <span class="tag"><?=$tag->name?></span>
                        <?php
                          endforeach;
                        ?>
                    </div>
                  <?php
                    endif;
                  ?>
              </div>
            <?php
              endif;
            ?>
          </div>
        </div>
      </article>
  </a>
  <?php
    endwhile; endif;
  ?>
</div>
