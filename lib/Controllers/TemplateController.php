<?php

namespace Celine\Theme\Controllers;

/**
 * Undocumented class
 */
class TemplateController
{
    public static function getBackgroundColor($tpl = "footer")
    {
        $bgColor = getField($tpl . "_background_color", "options");

        $bgColor = getField($tpl . "_background_is_gradient", "options") && self::_colorIsGradient($bgColor) ? "has-$bgColor-gradient-background" : "has-$bgColor-background-color";

        return $bgColor;
    }

    public static function getFontColor($tpl = "footer")
    {
        $fontColor = getField($tpl . "_text_color", "options");

        return "has-" . $fontColor . "-color";
    }

    public static function getHeroButtonColor($button)
    {
        $color = $button["hero_button_background_color"];

        $class = getField("primary_color", "options")["is_gradient"] ? "has-$color-gradient-background" : "has-$color-background-color";

        $class .= $color === "transparent" ? " has-white-border" : "";

        return $class;
    }

    public static function getHeroImageSlide($array)
    {
        $slide = "<div " . self::_getHeroClasses() . " " . self::_getHeroImage() . ">";
        $slide .= self::_get_template_part_content("template-parts/components/hero", "overlay");
        $slide .= self::_get_template_part_content("template-parts/components/hero", "info", $array);
        $slide .= "</div>";
        return $slide;
    }

    public static function getHeroVideo()
    {
        $video = "<video id='home-video' class='hero-video test' loop muted autoplay playsinline " . self::_getPosterImage() . ">";

        $video .= self::_getVideosByFormat(array("webm", "mp4"));

        $video .= "</video>";

        $video .= self::_get_template_part_content("template-parts/components/hero", "overlay");
        $video .= self::_get_template_part_content("template-parts/components/hero", "info");

        return $video;
    }

    public static function animate($animation = "fade", $offset = 50, $delay = 0)
    {
        return get_field("animations", "options") ? "data-aos=$animation data-aos-offset=$offset data-aos-delay=$delay" : "";
    }

    public static function isAnimated()
    {
        return get_field("animations", "options") ? "data-isAnimated=true" : "data-isAnimated=false";
    }

    public static function getPageHeader()
    {
        global $post;
        $postImage = wp_get_attachment_image_url(get_post_meta($post->ID, '_listing_image_id')[0], 'large');
        $bkgd = get_field('default_featured_image', 'options');

        if (is_search()) {
            $title = "Search Results: " . get_search_query();
            $bkgd = has_post_thumbnail() ? $postImage : get_field('default_featured_image', 'options');
        } elseif (is_404()) {
            $title = " ";
        } elseif (is_archive()) {
            if (is_post_type_archive('staff')) {
                $title = "Our Staff";
            } elseif (is_tax()) {
                $title = preg_replace("/^([\w ]+)Group:\s+/i", "", get_the_archive_title());
            } else {
                $title = str_replace("Category: ", "", str_replace("Archives: ", "", get_the_archive_title()));
            }
        } elseif (get_query_var('cat')) {
            $title = get_queried_object()->cat_name;
        } elseif (is_single()) {
            $title = get_the_category()[0]->cat_name ? get_the_category()[0]->cat_name : get_the_title();
            $bkgd = $postImage ? $postImage : get_field('default_featured_image', 'options');
        } else {
            $bkgd = has_post_thumbnail() ? get_the_post_thumbnail_url()/*$postImage*/ : get_field('default_featured_image', 'options');
            $title = get_the_title();
        }

        return ["title" => $title, "bkgd" => $bkgd];
    }

    private static function _getHeroClasses()
    {
        $class = "class='hero-slide";
        $class .= get_field("hero_parallax") ? " parallax'" : "'";
        return $class;
    }

    private static function _getHeroImage()
    {
        return "style=background-image:url(" . get_sub_field("hero_slider_image") . ");";
    }

    private static function _getPosterImage()
    {
        $posterImage = get_sub_field('poster_image') ? (get_sub_field('poster_image')['url'] ? get_sub_field('poster_image')['url'] : '') : '';
        return "poster=$posterImage";
    }

    private static function _getVideosByFormat($formats)
    {
        foreach ($formats as $format) {
            if (get_sub_field($format)) {
                $src = get_sub_field($format)['url'] ? get_sub_field($format)['url'] : '';
                return "<source src=$src type='video/$format'>";
            }
        }
    }

    public static function _get_template_part_content($slug, $name = \null, $array = \null)
    {
        ob_start();
        get_template_part($slug, $name, $array);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    private static function _colorIsGradient($color)
    {
        return getField($color . "_color", "options")["is_gradient"];
    }

    /**
     * Limit the excerpt to $limit.
     *
     * @param integer $limit.
     * @return string shortened excerpt.
     */
    public static function excerpt($limit = 25)
    {
        return wp_trim_words(has_excerpt() ? get_the_excerpt() : get_the_content(), $limit);
    }

    private static function _getColor($color = "primary")
    {
        return getField($color . "_color", "options");
    }

    public static function generateThemeJson()
    {

        $json = [];
        $json["version"] = 1;

        $colors[] = "solid";

        $colors = [
            "primary",
            "secondary",
            "tertiary",
            "quaternary"
        ];

        foreach ($colors as $color) {
            $c = self::_getColor($color);

            $json["settings"]["color"]["palette"][] = [
                "name" => ucfirst($color),
                "slug" => $color,
                "color" => $c["color"],
            ];

            if ($c["is_gradient"]) {
                $json["settings"]["color"]["palette"][] = [
                    "name" => ucfirst($color) . "-2",
                    "slug" => $color . "-2",
                    "color" => $c["color_2"]
                ];
            }
        }

        file_put_contents(get_template_directory() . "/theme.json", wp_json_encode($json), LOCK_EX);
    }
}
