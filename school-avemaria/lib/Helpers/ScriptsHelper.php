<?php

namespace Celine\Theme\Helpers;

/**
 * Helper Class to enqueue scripts
 */
class ScriptsHelper extends EnqueueHelper
{
    /**
     * Init Function of Scripts Helper class
     *
     * @return void
     */
    public static function init()
    {
        add_action('wp_enqueue_scripts', array(__CLASS__, 'celineScripts'));
    }

    /**
     * Enqueue all scripts
     *
     * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_script/
     * @return void
     */
    public static function celineScripts()
    {
        wp_enqueue_script(
            'jquery-ui',
            'https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js',
            array('jquery'),
            '1.9.2'
        );

        $filepath = get_template_directory_uri() . "/assets/js/navigation.js";

        wp_enqueue_script(
            'celine-navigation',
            $filepath,
            array(),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/smoothscroll.js";

        wp_enqueue_script(
            'celine-smoothscroll',
            $filepath,
            array('jquery'),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/skip-link-focus-fix.js";

        wp_enqueue_script(
            'celine-skip-link-focus-fix',
            $filepath,
            array(),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/aos.js";

        wp_enqueue_script(
            'aosjs',
            $filepath,
            false,
            null,
            false
        );

        wp_enqueue_script(
            'slick-js',
            get_template_directory_uri() . '/assets/slick/slick.min.js',
            array('jquery'),
            null,
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/slick-init.js";

        wp_enqueue_script(
            'slick-init-js',
            $filepath,
            array('slick-js', 'jquery'),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/tabs.js";

        wp_enqueue_script(
            'tabs-js',
            $filepath,
            array('jquery'),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/search-form.js";

        wp_enqueue_script(
            'search-form-js',
            $filepath,
            array('jquery'),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/cpts.js";

        wp_enqueue_script(
            'cpts-js',
            $filepath,
            array('jquery'),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/mobileMaxMegaMenu.js";

        wp_enqueue_script(
            'mobileMaxMegaMenu',
            $filepath,
            array('jquery'),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/general.js";

        wp_enqueue_script(
            'celine-general',
            $filepath,
            array('jquery'),
            self::getVersion($filepath),
            true
        );

        $filepath = get_template_directory_uri() . "/assets/js/carousel.js";

        wp_enqueue_script(
            'carousel',
            $filepath,
            array('jquery'),
            self::getVersion($filepath),
            true
        );

        wp_enqueue_script(
            'materialize-js',
            'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }
}
