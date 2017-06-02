<table class="wp-list-table widefat fixed striped posts">
  <thead>
    <tr>
      <th class="manage-column column-title column-primary sortable desc">
        Title
      </th>
      <th class="manage-column column-title column-primary sortable desc">
        Author
      </th>
      <th class="manage-column column-title column-primary sortable desc">
        Categories
      </th>
      <th class="manage-column column-title column-primary sortable desc">
        Tags
      </th>
      <th class="manage-column column-title column-primary sortable desc">
        Date
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
      if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();
    ?>
      <tr>
        <td>
          <a class="x-recent-post <?=$count . ' ' . $image_output_class ?>"
            href="<?=get_permalink( get_the_ID() )?>"
            title="<?=esc_attr( sprintf( __( 'Permalink to: "%s"', $handle ), the_title_attribute( 'echo=0' ) ) )?>">
            <h3 class="h-recent-posts"><?=get_the_title()?></h3>
          </a>
        </td>
        <td>
          <?=get_the_author()?>
        </td>
        <td>

        </td>
        <td>
        </td>
        <td>
          <?=get_the_date()?>
        </td>
      </tr>
    <?php
      endwhile; endif;
    ?>
  </tbody>
</table>
