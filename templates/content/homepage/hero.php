<?php

/**
 * Partial for Homepage Hero
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

$hero = get_field("is_video") ? "video" : "image";
get_template_part("template-parts/components/hero", $hero);