<?php

namespace Celine\Theme\Controllers;

/**
 * Undocumented class
 */
class MinistriesController
{
    CONST TAX = "ministry-group";
    CONST POSTTYPE = "ministry";

    public static function getMinistryArchive()
    {
        if (self::ministryIsSlider()) {
            get_template_part("template-parts/cpts/archives/ministry", "slider");
        } else {
            get_template_part("template-parts/cpts/archives/ministry", "funnel");
        }
    }

    public static function getMinistryGroups()
    {
        $terms = get_terms(
            array(
                'taxonomy'   => self::_getTax(),
                'hide_empty' => false,
                "orderby"=>"date",
                "order"=>"DESC"
            )
        );

        return $terms;
    }

    public static function getMinistriesByGroup($term_id)
    {
        $args = array(
            "post_type" => self::_getPosttype(),
            "tax_query"=>array(
                array(
                    "taxonomy" => self::_getTax(),
                    "field" => "term_id",
                    "terms" => $term_id
                )
            ),
            "orderby" => "title",
            "order" => "ASC"
        );

        $q = new \WP_Query($args);
        return $q->posts;
    }

    public static function ministryIsSlider()
    {
        $page = get_page_by_path("ministries");
        return get_field("ministry_is_slider", $page);
    }

    public static function getMinistryBackLink()
    {
        return get_field("ministry_group_back_button", "options") ? get_permalink(self::getMinistryObject()) : "/ministries";
    }

    public static function getContactForm()
    {
        $id = get_field("ministry_contact_form_id", "options") ? get_field("ministry_contact_form_id", "options")["id"] : 1;
        return do_shortcode("[gravityform id='$id' title='false' description='false' ajax='true']");
    }

    public static function getStaffMembersByMinistry($id = false)
    {
        return get_field("contacts", $id);
    }

    private static function _getTax()
    {
        return self::TAX;
    }

    private static function _getPosttype()
    {
        return self::POSTTYPE;
    }
}
