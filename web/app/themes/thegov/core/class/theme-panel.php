<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
* Wgl_Theme_Panel
*
*
* @class        Wgl_Theme_Panel
* @version      1.0
* @category Class
* @author       WebGeniusLab
*/

if (!class_exists('Wgl_Theme_Panel')) {
    class Wgl_Theme_Panel{

        /**
        * @access      private
        * @var         \Wgl_Theme_Panel $instance
        * @since       3.0.0
        */
        private static $instance;

        /**
        * Get active instance
        *
        * @access      public
        * @since       3.1.3
        * @return      self::$instance
        */
        public static function instance() {
            if ( ! self::$instance ) {
                self::$instance = new self;
                self::$instance->hooks();
            }

            return self::$instance;
        }

        // Shim since we changed the function name. Deprecated.
        public static function get_instance() {
            if ( ! self::$instance ) {
                self::$instance = new self;
                self::$instance->hooks();
            }

            return self::$instance;
        }

        private function hooks(){
            /* ----------------------------------------------------------------------------- */
            /* Add Menu Page */
            /* ----------------------------------------------------------------------------- */ 
            add_action( 'admin_menu', array( $this, 'theme_panel_admin_menu' ));
            add_action( 'admin_init', array( $this, 'theme_redirect' ) );
        }

        public function theme_panel_admin_menu(){
            add_menu_page (
                esc_html__('WebGeniusLab', 'thegov'),
                esc_html__('WebGeniusLab', 'thegov'), 
                'manage_options', // capability
                'wgl-dashboard-panel',  // menu-slug
                array( $this, 'theme_panel_welcome_render' ),   // function that will render its output
                get_template_directory_uri() . '/core/admin/img/dashboard/dashboad_icon.svg',    // link to the icon that will be displayed in the sidebar
                2    // position of the menu option
            );
            $submenu = array();
            $submenu[] = array(
                esc_html__('Welcome', 'thegov'),    //page_title
                esc_html__('Welcome', 'thegov'),    //menu_title
                'manage_options',                               //capability
                'wgl-dashboard-panel',                          //menu_slug
                array( $this, 'theme_panel_welcome_render' ),   // function that will render its output
            );

            if (current_user_can( 'activate_plugins' )):
                $submenu[] = array(
                    esc_html__('Theme Plugins', 'thegov'),   //page_title
                    esc_html__('Theme Plugins', 'thegov'),   //menu_title
                    'edit_posts',                          //capability
                    'wgl-plugins-panel',                   //menu_slug
                    array( $this, 'theme_plugins' ),       // function that will render its output
                );
            endif;            


            $submenu[] = array(
                esc_html__('Requirements', 'thegov'),   //page_title
                esc_html__('Requirements', 'thegov'),   //menu_title
                'edit_posts',                          //capability
                'wgl-status-panel',                   //menu_slug
                array( $this, 'theme_status' ),       // function that will render its output
            );            


            $submenu[] = array(
                esc_html__('Activate Theme', 'thegov'),   //page_title
                esc_html__('Activate Theme', 'thegov'),   //menu_title
                'edit_posts',                           //capability
                'wgl-activate-theme-panel',             //menu_slug
                array( $this, 'theme_activate' ),       // function that will render its output
            );            

            $submenu[] = array(
                esc_html__('Help Center', 'thegov'),   //page_title
                esc_html__('Help Center', 'thegov'),   //menu_title
                'edit_posts',                           //capability
                'wgl-theme-helper-panel',             //menu_slug
                array( $this, 'theme_helper' ),       // function that will render its output
            );             
            if ( class_exists( 'Thegov_Core' ) ) {
                $submenu[] = array(
                    esc_html__('Theme Options', 'thegov'),   //page_title
                    esc_html__('Theme Options', 'thegov'),   //menu_title
                    'edit_posts',                           //capability
                    'wgl-theme-options-panel',             //menu_slug
                    array( $this, 'theme_options' ),       // function that will render its output
                );
            }

            $submenu = apply_filters('wgl_panel_submenu', array( $submenu ) );
            
            foreach ($submenu[0] as $key => $value) {
                add_submenu_page(
                    'wgl-dashboard-panel',               //parent menu slug
                    $value[0],                           //page_title
                    $value[1],                           //menu_title
                    $value[2],                           //capability
                    $value[3],                           //menu_slug
                    $value[4]                            //function that will render its output
                );
            }
        }

        public function theme_dashboard_heading(){
            global $submenu;

            $menu_items = '';

            if (isset($submenu['wgl-dashboard-panel'])):
              $menu_items = $submenu['wgl-dashboard-panel'];
            endif;

            if (!empty($menu_items)) : 
            ?>
              <div class="wrap wgl-wrapper-notify">
                <div class="nav-tab-wrapper">
                  <?php foreach ($menu_items as $item): 
                    $class = isset($_GET['page']) && $_GET['page'] == $item[2] ? ' nav-tab-active' : '';
                    ?>
                    <a href="<?php echo esc_url(admin_url('admin.php?page='.$item[2].''));?>" 
                        class="nav-tab<?php echo esc_attr($class);?>"
                    >
                        <?php echo esc_html($item[0]); ?>
                            
                    </a>
                  <?php endforeach; ?>
                </div>
              </div> 
            <?php endif;             
        }

        public function theme_panel_welcome_render(){
            
            $this->theme_dashboard_heading();

            /**
             * Template View Welcome
             */
            require_once( get_theme_file_path('/core/dashboard/tpl-view-weclome.php') );
        }

        public function theme_plugins(){
            
            $this->theme_dashboard_heading();

            /**
             * Template View Plugin
             */
            require_once(  get_theme_file_path('/core/dashboard/tpl-view-plugins.php') );
        }
        
        public function theme_status(){
            
            $this->theme_dashboard_heading();

            /**
             * Template View Plugin
             */
            require_once( get_theme_file_path('/core/dashboard/tpl-view-status.php') );

        }        

        public function theme_activate(){
            
            $this->theme_dashboard_heading();

            /**
             * Template View Plugin
             */
            require_once( get_theme_file_path('/core/dashboard/tpl-view-activate-theme.php') );
        }        

        public function theme_helper(){
            
            $this->theme_dashboard_heading();

            /**
             * Template View Plugin
             */
            require_once( get_theme_file_path('/core/dashboard/tpl-view-theme-helper.php') );
        }

        public function theme_options() {}        

        public function theme_redirect() {
            global $pagenow;
            if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
                wp_safe_redirect( esc_url(admin_url( 'admin.php?page=wgl-dashboard-panel' )) );
                exit;
            }
        }

    }
}

Wgl_Theme_Panel::get_instance();


?>