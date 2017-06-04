<?php
  if(!function_exists('should_show_field')){
    function should_show_field($field_name, $list_fields){
      return strpos(strtolower($list_fields), strtolower($field_name)) !== false;
    }
  }
?>

<table class="wp-list-table widefat fixed striped posts">
  <thead>
    <tr>
      <?php
        if(should_show_field('title', $list_fields)):
      ?>
          <th class="manage-column column-title column-primary sortable desc">
            Title
          </th>
      <?php
        endif;

        if(should_show_field('author', $list_fields)):
      ?>
          <th class="manage-column column-title column-primary sortable desc">
            Author
          </th>
      <?php
        endif;
        if(should_show_field('categories', $list_fields)):
      ?>
          <th class="manage-column column-title column-primary sortable desc">
            Categories
          </th>
      <?php
        endif;
        if(should_show_field('tags', $list_fields)):
      ?>
          <th class="manage-column column-title column-primary sortable desc">
            Tags
          </th>
      <?php
        endif;
        if(should_show_field('date', $list_fields)):
      ?>
          <th class="manage-column column-title column-primary sortable desc">
            Date
          </th>
      <?php
        endif;
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
      if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();
    ?>
      <tr>
        <?php
          if(should_show_field('title', $list_fields)):
        ?>
            <td>
              <a class="x-recent-post <?=$count . ' ' . $image_output_class ?>"
                href="<?=get_permalink( get_the_ID() )?>"
                title="<?=esc_attr( sprintf( __( 'Permalink to: "%s"', $handle ), the_title_attribute( 'echo=0' ) ) )?>">
                <h3 class="h-recent-posts"><?=get_the_title()?></h3>
              </a>
            </td>
        <?php
          endif;
          if(should_show_field('author', $list_fields)):
        ?>
        <td>
          <?=get_the_author()?>
        </td>
        <?php
          endif;
          if(should_show_field('categories', $list_fields)):
        ?>
        <td>
          <?php
            if($post_categories = wp_get_post_categories(get_the_ID())):
              foreach($post_categories as $c):
                $cat = get_category( $c );
            ?>
                  <span class="category"><?=$cat->name?></span>
                <?php
              endforeach;
            endif;
          ?>
        </td>
        <?php
          endif;
          if(should_show_field('tags', $list_fields)):
        ?>
        <td>
          <?php
            $posttags = get_the_tags();
            if ($posttags) {
              foreach($posttags as $tag) {
                ?>
                  <span class="tag"><?=$tag->name?></span>
                <?php
              }
            }
          ?>
        </td>
        <?php
          endif;
          if(should_show_field('date', $list_fields)):
        ?>
        <td>
          <?=get_the_date()?>
        </td>
        <?php
          endif;
        ?>
      </tr>
    <?php
      endwhile; endif;
    ?>
  </tbody>
</table>
