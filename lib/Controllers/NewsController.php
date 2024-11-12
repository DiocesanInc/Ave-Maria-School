<?php

namespace Celine\Theme\Controllers;

/**
 * Undocumented class
 */
class NewsController
{
    public static function getNews()
    {
        $args = array(
            "numberposts" => 3,
            "orderby" => "date",
            "order" => "DESC"
        );

        if (have_rows("news_selection")) {
            $newsIds = get_field("news_selection");
            $args["post__in"] = $newsIds;
        }
        return get_posts($args);
    }
}