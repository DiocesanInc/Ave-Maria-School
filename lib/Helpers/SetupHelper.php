<?php

namespace Celine\Theme\Helpers;

/**
 * Helper CLass to setup of the theme
 */
class SetupHelper
{
    /**
     * Init Function of SetupHelper
     *
     * @return void
     */
    public static function init()
    {
        self::isACFInstalled();

        add_action('after_setup_theme', array(__CLASS__, "celineSetup"));
        add_action('after_setup_theme', array(__CLASS__, "celineContentWidth"));
        add_action('after_setup_theme', array(__CLASS__, "addACFOptionsPage"));

        add_shortcode("hide-email", array(__CLASS__, "diocesanHideEmail"));

        add_filter("the_content", array(__CLASS__, "diocesanAutoHideEmail"), 30);
        add_filter("acf_the_content", array(__CLASS__, "diocesanAutoHideEmail"), 30);
        add_filter("acf/load_value", array(__CLASS__, "diocesanAutoHideEmail"), 30);

        add_action('admin_head', array(__CLASS__, 'hideACFCog'));

        // add_filter('excerpt_length', 'custom_excerpt_length', 999);
        // add_filter('excerpt_more', 'celine_excerpt_more');


    }

    /**
     * Check if ACF is installed
     *
     * @return boolean
     */
    public static function isACFInstalled()
    {
        if (is_admin() && (!function_exists('get_field') || !function_exists('have_rows'))) {
            echo '<div class="error notice">
                <p>There’s a problem with Advanced Custom Fields. It might not be installed</p>
            </div>';
            return false;
        }
        return true;
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @return void
     */
    public static function celineSetup()
    {
        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Celine, use a find and replace
         * to change 'celine' to the name of your theme in all the template files.
         *
         * @link https://developer.wordpress.org/reference/functions/load_theme_textdomain/
         */
        load_theme_textdomain('celine', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to head.
         *
         * @link https://codex.wordpress.org/Automatic_Feed_Links
         */
        add_theme_support('automatic-feed-links');

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         *
         * @link https://codex.wordpress.org/Title_Tag
         */
        add_theme_support('title-tag');

        /**
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /**
         * This theme uses wp_nav_menu() in one location.
         *
         * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
         */
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'celine'),
                'menu-2' => esc_html__('Secondary', 'celine'),
            )
        );

        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         *
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'gallery',
                'caption',
                'style',
                'script'
            )
        );

        /**
         * Set up the WordPress core custom background feature.
         *
         * @link https://codex.wordpress.org/Custom_Backgrounds
         */
        add_theme_support(
            'custom-background',
            apply_filters(
                'celine_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        /**
         * Add theme support for selective refresh for widgets.
         *
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
         */
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        /**
         * Add Post Type Support
         *
         * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
         */
        if (function_exists('get_field') && get_field('has_custom_excerpts', 'options')) {
            add_post_type_support('page', 'excerpt');
        }

        add_post_type_support('post', 'page-attributes');

        /**
         * Add Featured Image size.
         *
         * @link https://developer.wordpress.org/reference/functions/add_image_size/
         */
        if (function_exists('add_image_size')) {
            add_image_size('featured', 1500, 9999); // 1500 pixels wide (and unlimited height)
        }

        $colors = array(
            'Primary'    => get_field('primary_color', 'options')["color"],
            'Secondary'  => get_field('secondary_color', 'options')["color"],
            'Tertiary'   => get_field('tertiary_color', 'options')["color"],
            'Quaternary' => get_field('quaternary_color', 'options')["color"],
            'Black'      => '#111111',
            'White'      => '#FFFFFF'
        );

        foreach ($colors as $color => $rgb) {
            $palette[] = array(
                'name'  => $color,
                'slug'  => strtolower($color),
                'color' => $rgb
            );
        }

        add_theme_support('editor-color-palette', $palette);
    }

    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global integer $content_width
     * @return void
     */
    public static function celineContentWidth()
    {
        // This variable is intended to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters('celine_content_width', 640);
    }

    /**
     * Add ACF Options Page
     *
     * @link   https://www.advancedcustomfields.com/resources/acf_add_options_page/
     * @return void
     */
    public static function addACFOptionsPage()
    {
        if(self::isACFInstalled()) {
            acf_add_options_page(
                array(
                    'page_title'      => 'Theme General Settings',
                    'menu_title'      => 'Theme Settings',
                    'menu_slug'       => 'theme-general-settings',
                    'capability'      => 'edit_posts',
                    'redirect'        => false
                )
            );

            acf_add_options_sub_page(
                array(
                    'page_title'     => 'Theme Header Settings',
                    'menu_title'     => 'Header Settings',
                    'parent_slug'    => 'theme-general-settings',
                )
            );

            acf_add_options_sub_page(
                array(
                    'page_title'     => 'Theme Footer Settings',
                    'menu_title'     => 'Footer Settings',
                    'parent_slug'    => 'theme-general-settings',
                )
            );

            acf_add_options_page(
                array(
                    'page_title'     => 'Template Settings',
                    'menu_title'     => 'Template Settings',
                    'menu_slug'      => 'template-settings',
                    'capability'     => 'edit_posts',
                    'icon_url'       => 'dashicons-admin-tools',
                    'redirect'       => false
                )
            );
        }
    }

    /**
     * Hide/Protect Shortcode.
     * Obfuscate Email
     *
     * @param string $email Email address
     *
     * @return string.
     */
    public static function diocesanHideEmail($email)
    {
        return function_exists("is_email") && function_exists("antispambot") ?
            antispambot($email) : $email;
    }

    /**
     * Hide email address when page/post content is shown.
     * Works with mailto tags
     *
     * @param string $content Content
     *
     * @return string.
     */
    public static function diocesanAutoHideEmail($content)
    {
        if (is_string($content) && strpos($content, "@") !== false) {
            // Some emails could pass this and fail the is_email wordpress function later on.
            // Let KEadie know to tweak it.
            $pattern = '/([\w\-?&;#~=\.\/]+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,}|[0-9]{1,})(\]?))/i';
            $content = preg_replace_callback(
                $pattern,
                function ($matches) {
                    return self::diocesanHideEmail($matches[0]);
                },
                $content
            );
        }
        return $content;
    }

    /**
     * Disable ACF cog shortcut.
     *
     * @link https://support.advancedcustomfields.com/forums/topic/remove-edit-field-group-cog/
     *
     * @return void
     */
    public static function hideACFCog()
    {
        echo '<style type="text/css">
			h2.hndle.ui-sortable-handle ~ .handle-actions a.acf-hndle-cog { display: none; visibility: hidden; }
		</style>';
    }

    /**
     * Filter the except length to 50 words.
     *
     * @link https://developer.wordpress.org/reference/hooks/excerpt_length/
     *
     * @param integer $length Excerpt length.
     * @return integer modified excerpt length.
     */
    // function custom_excerpt_length($length)
    // {
    //     return 20;
    // }

    /**
   * Filter the excerpt "read more" string.
   *
   * @link https://developer.wordpress.org/reference/hooks/excerpt_more/
   *
   * @param string $more "Read more" excerpt string.
   * @return string modified "read more" excerpt string.
   */
    function celine_excerpt_more($more)
    {
        return '…';
    }
}
