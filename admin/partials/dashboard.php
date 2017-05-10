<?php
  require_once( plugin_dir_path( __FILE__ ) . '../Parsedown.php');

  $changeLogFile = plugin_dir_path( __FILE__ ) . '../../CHANGELOG.md';
  $changeLogContents = '';
  
  $fp = fopen( $changeLogFile, 'r' );
  
  if($fp && filesize($changeLogFile) > 0){
    $changeLogStr = fread($fp, filesize($changeLogFile));
    fclose($fp);

    $Parsedown = new Parsedown();
    $changeLogContents = $Parsedown->text($changeLogStr);
  }
?>
<div class="tco-reset tco-wrap tco-wrap-settings tco-alt-cs" data-tco-module="cs-settings">
  <div class="tco-content">
    <div class="wrap"><h2>WordPress Wrap</h2></div>

    <form name="frm-element-list" method="post" class="tco-form" action="options.php">
      <?php
      $options = get_option($this->dashboardoptskey);
      $elements = Cornerstone_Powerpack_Elements::get_elements();
      if (!is_array($options)) $options = array();
      settings_fields($this->dashboardoptskey);
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
                  $v = (isset($options[$f])) ? (integer) $options[$f] : 1;
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
                        <a href="<?php echo esc_url($video_url); ?>" class="tco-btn tco-btn-sm tco-btn-yep" title="Video Player" data-cspplity>
	                        Video Tutorial
	                      </a>
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
                <h2 class="tco-box-title">D3fy Development Group</h2>
              </header>
              <div class="tco-box-content">
                <p style="text-align:center">
                    Made with <span style="color:#FF0066;">&hearts;</span> by
                </p>
                <img src="<?php echo plugins_url('cornerstone-powerpack/public/images/black-logo.png', 'cornerstone-powerpack') ?>">
                <p style="margin:1em 0;text-align:center">
                   Based in Phoenix, Arizona.<br/>
                   We are a unique set of individuals with a high skillset and various backgrounds.<br/>
                   We’ve come together to share our passion for building for the web.
                </p>
                <a class="tco-btn tco-btn-block"
                    href="https://www.d3fy.com/#team"
                    target="_blank"
                    style="text-align: center"
                >
                  Learn More
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php
            if(strlen($changeLogContents) > 0):
          ?>
          <div class="tco-row changelog-container">
            <div class="tco-column">
              <div class="tco-box">
                <header class="tco-box-header">
                  <h2 class="tco-box-title">Change log</h2>
                </header>
                <div class="tco-box-content">
                  <?php
                    echo $changeLogContents;
                  ?>
                </div>
              </div>
            </div>
          </div>
          <?php
            endif;
          ?>
      </div>
    </form>
  </div>
</div>
