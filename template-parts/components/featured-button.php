<?php

/**
 * Partial template for a single featured button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

if (get_sub_field('link')) :
    $link = get_sub_field('link');
    $icon  = get_sub_field('icon');
    if ($link["url"]) :
        $icon = "<span class='featured-button-icon'>$icon</span>";
        $linkText = "<span class='featured-button-text'>" . $link["title"] . "</span>";
        $content = $icon . $linkText;
        echo acf_link($link, "featured-button has-underline-hover", $content);
    endif;
endif;