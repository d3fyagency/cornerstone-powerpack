<div class="tco-reset tco-wrap tco-wrap-settings tco-alt-cs" data-tco-module="cs-settings">
  <div class="tco-content">
    <div class="wrap"><h2>WordPress Wrap</h2></div>
    
    <form method="post" class="tco-form" action="options.php">
      <?php
      $options = get_option($this->dashboardoptskey);
      if (!is_array($options)) $options = array();
      settings_fields($this->dashboardoptskey);
      $elements = Cornerstone_Powerpack_Elements::get_elements();
      ?>
      
      <div class="tco-main">
        <div class="tco-row">
          <div class="tco-column">
            <div class="tco-box">
              <header class="tco-box-header">
                <h2 class="tco-box-title">Cornerstone Elements</h2>
              </header>
              <div class="tco-box-content cspp-settings-info">
                <p>Use the settings below to control which Elements are activated and available to use in Cornerstone.</p>
              </div>
              <div class="tco-box-content tco-pan">
                
                <?php
                foreach ($elements as $f => $el):
                  $id = $this->dashboardoptskey.'_'.$f;
                  $name = $this->dashboardoptskey.'['.$f.']';
                  $v = (isset($options[$f])) ? (integer) $options[$f] : 0;
                  $opts = Cornerstone_Powerpack_Elements::get_element_opts($f);
                ?>
                
                    <div class="tco-form-setting">
                      <div class="tco-form-setting-info">
                        <label for="cs-control-show_wp_toolbar">
                          <strong><?php echo esc_html($el['name']) ?></strong> 
                          <span><?php echo esc_html($el['desc']) ?></span>
                        </label>
                      </div>
                      <div class="tco-form-setting-control">
                        <label class="tco-rc tco-checkbox" for="<?php echo esc_attr($id); ?>">
                          <input id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($name); ?>"  value="1"  class="tco-form-control tco-form-control-max"  type="checkbox" data-cs-control="checkbox" <?php if ($v == 1): ?>checked="checked"<?php endif; ?>>
                          <span class="tco-form-control-indicator"></span>
                          <span class="tco-form-control-indicator-label">Enable</span>
                        </label>
                        <?php if ($video_url = $opts->get('video_url')): ?>
                        <a href="<?php echo esc_url(
                            'index.php?page=cornerstone_powerpack_video_page_hidden&cspp_elementkey='
                              .urlencode($f)
                              .'&TB_iframe=true&width=875&height=512'
                          ); ?>" class="thickbox tco-btn tco-btn-sm tco-btn-yep" title="Video Player">Video Tutorial</a> 
                        <?php endif; ?>
                      </div>
                    </div>
                
                <?php
                endforeach;
                ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tco-sidebar">
        <div class="tco-row">
          <div class="tco-column">
            <div class="tco-box">
              <header class="tco-box-header">
                <h2 class="tco-box-title">Save</h2>
              </header>
              <div class="tco-box-content">
                <p>Once you are satisfied with your settings, click the button below to save them.</p>
                <button class="tco-btn tco-btn-block" type="submit" name="submit" data-tco-module-target="update">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </form>

  </div>
</div>
