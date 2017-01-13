<div class="tco-reset tco-wrap tco-wrap-settings tco-alt-cs" data-tco-module="cs-settings">
  <div class="tco-content">
    <div class="wrap"><h2>WordPress Wrap</h2></div>
    
    <form method="post" class="tco-form" action="options.php">
      <?php
      $options = get_option($this->dashboardoptskey);
      if (!is_array($options)) $options = array();
      settings_fields($this->dashboardoptskey);

      $elements = array(
          'responsive-slider' => array(
              'friendly_name' => 'Responsive Slider',
              'description' => 'Responsive slider with text and content sizing relative to the window width, resulting in consistent layout regardless of screen size.',
              'id' => $this->dashboardoptskey . '_responsive-slider',
              'name' => $this->dashboardoptskey.'[responsive-slider]',
              'value' => (isset($options['responsive-slider'])) ? (integer) $options['responsive-slider'] : 0
            ),

          'team-members' => array(
              'friendly_name' => 'Team Members',
              'description' => 'Adds a Team Member element to the Cornerstone Page Builder in WordPress. Displays photo of team member with a Modal pop-up when clicked on which shows additional information.',
              'id' => $this->dashboardoptskey . '_team-members',
              'name' => $this->dashboardoptskey.'[team-members]',
              'value' => (isset($options['team-members'])) ? (integer) $options['team-members'] : 0
            ),
        );
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
                  foreach($elements as $f => $el):
                ?>
                    <div class="tco-form-setting">
                      <div class="tco-form-setting-info">
                        <label for="cs-control-show_wp_toolbar">
                          <strong><?php echo $el['friendly_name'] ?></strong> 
                          <span><?php echo $el['description'] ?></span>
                        </label>
                      </div>
                      <div class="tco-form-setting-control">
                        <label class="tco-rc tco-checkbox" for="<?php echo esc_attr($el['id']); ?>">
                          <input id="<?php echo esc_attr($el['id']); ?>" name="<?php echo esc_attr($el['name']); ?>"  value="1"  class="tco-form-control tco-form-control-max"  type="checkbox" data-cs-control="checkbox" <?php if ($el['value'] == 1): ?>checked="checked"<?php endif; ?>>
                          <span class="tco-form-control-indicator"></span>
                          <span class="tco-form-control-indicator-label">Enable</span>
                        </label>
                      </div>
                    </div>
                <?php
                  endforeach;
                ?>
                <!-- Another Element -->
                <?php
                $f = 'test-element';
                $id = $this->dashboardoptskey.'_'.$f;
                $name = $this->dashboardoptskey.'['.$f.']';
                $v = (isset($options[$f])) ? (integer) $options[$f] : 0;
                ?>
                <div class="tco-form-setting">
                  <div class="tco-form-setting-info">
                    <label for="cs-control-show_wp_toolbar">
                      <strong>Another Element</strong> 
                      <span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed condimentum. Quisque vel dolor ut diam ullamcorper ullamcorper.</span>
                    </label>
                  </div>
                  <div class="tco-form-setting-control">
                    <label class="tco-rc tco-checkbox" for="<?php echo esc_attr($id); ?>">
                      <input id="<?php echo esc_attr($id); ?>" name="<?php echo esc_attr($name); ?>"  value="1"  class="tco-form-control tco-form-control-max"  type="checkbox" data-cs-control="checkbox" <?php if ($v == 1): ?>checked="checked"<?php endif; ?>>
                      <span class="tco-form-control-indicator"></span>
                      <span class="tco-form-control-indicator-label">Enable</span>
                    </label>
                  </div>
                </div>
                
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
