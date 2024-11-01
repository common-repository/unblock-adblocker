<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://kites.dev
 * @since      1.0.0
 *
 * @package    Adblock Detect
 * @subpackage Adblock Detect/admin/partials
 */

?>

<div class="wrap">
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">

           <div class="nav_area">
           <h3 class="nav-tab-wrapper kites_nav">
                    <a href="<?php echo network_admin_url( 'admin.php?page=' . $this->plugin_name . '-general-settings-page' . '&tab=general_settings' ); ?>" class="nav-tab <?php echo ( $this->get_current_tab() == 'general_settings' ) ? 'nav-tab-active' : ''; ?>">General</a>
                    <a href="<?php echo network_admin_url( 'admin.php?page=' . $this->plugin_name . '-general-settings-page' . '&tab=content_settings' ); ?>" class="nav-tab <?php echo ( $this->get_current_tab() == 'content_settings' ) ? 'nav-tab-active' : ''; ?>">Content</a>
                    <a href="<?php echo network_admin_url( 'admin.php?page=' . $this->plugin_name . '-general-settings-page' . '&tab=style_settings' ); ?>" class="nav-tab <?php echo ( $this->get_current_tab() == 'style_settings' ) ? 'nav-tab-active' : ''; ?>">Style (Pro) </a>
                    <a style="display:none;" href="<?php echo network_admin_url( 'admin.php?page=' . $this->plugin_name . '-general-settings-page' . '&tab=theme_settings' ); ?>" class="nav-tab <?php echo ( $this->get_current_tab() == 'theme_settings' ) ? 'nav-tab-active' : ''; ?>">Themes (Pro) </a>
                
                </h3>
           </div>
            <div id="post-body-content" class="uaplugin-admin-body">

                <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
                <input type="hidden" id="unblockadblocker_sitrurl" value="<?php echo get_site_url(); ?>">
 
                <form method="post" action="options.php">
                    <?php 
                      $country_slug = "all_country";
                      if(isset($_GET['country'])){
                        $selected_country = sanitize_title(esc_attr($_GET['country']));
                      }
                      else {
                        $selected_country = sanitize_title($country_slug);
                      }
                     
                        
                    ?>
                <input type="hidden" name="unblockadblocker_country" value="<?php echo $selected_country; ?>">
                    
                    <?php

                    if( $this->get_current_tab() == 'content_settings' ) {

                        settings_fields( $this->plugin_name . '-content-settings-group' );
                        do_settings_sections( $this->plugin_name . '-content-settings-page' );
                        submit_button( 'Save Settings' );

                    }
                    elseif( $this->get_current_tab() == 'style_settings' ) {

                        settings_fields( $this->plugin_name . '-style-settings-group' );
                        do_settings_sections( $this->plugin_name . '-style-settings-page' );
                        submit_button( 'Save Settings' );

                    }
                    elseif( $this->get_current_tab() == 'theme_settings' ) {

                        settings_fields( $this->plugin_name . '-theme-settings-group' );
                        do_settings_sections( $this->plugin_name . '-theme-settings-page' );
                        submit_button( 'Save Settings' );

                    }
                    else {

                        settings_fields( $this->plugin_name . '-general-settings-group' );
                        do_settings_sections( $this->plugin_name . '-general-settings-page' );
                        submit_button( 'Save Settings' );

                    }

                ?>
                
            
            </form>
            </div>
         
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>