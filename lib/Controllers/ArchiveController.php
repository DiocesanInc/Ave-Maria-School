<?php

/**
 * Archive Controller class file for celine theme
 * php version 7.2.34
 *
 * @category Controller_Class
 * @package  Celine
 * @author   Marcus Borger <mborger@diocesan.org>
 * @license  MIT celine.diocesanweb.org
 * @link     celine.diocesanweb.org
 */

namespace Celine\Theme\Controllers;

/**
 * Class that provides functions used in archive templates
 *
 * @category Controller
 * @package  Celine
 * @author   Marcus Borger <mborger@diocesan.org>
 * @license  MIT celine.diocesanweb.org
 * @link     celine.diocesanweb.org
 */
class ArchiveController
{
    /**
     * Retrieve css classes for container based on post type
     *
     * @return void
     */
    public static function getArchiveContainerClasses()
    {
        $classes[] = self::_getArchiveContainerClassName();
        $classes[] = "entry-content";
        $classes[] = "limit-width";
        return implode(" ", $classes);
    }

    /**
     * Retrieve Staff members
     *
     * @return mixed
     */
    public static function getStaffMembers()
    {
        $args = array(
           'post_type' => 'staff',
           'post_status'    => 'publish',
           'posts_per_page' => -1,
           'orderby'        => 'menu_order',
           'order'          => 'ASC'
        );
        return new \WP_Query($args);
    }

    /**
     * Retrieve css container class
     *
     * @return void
     */
    private static function _getArchiveContainerClassName()
    {
        return str_replace(' ', '-', strtolower(get_post_type() . '-container'));
    }
}
