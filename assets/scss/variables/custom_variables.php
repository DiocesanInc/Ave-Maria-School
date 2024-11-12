<?php

$genericCss = new CssHelper(
    [],
    "custom_variables",
    false
);

/**
 * Header
 */
$genericCss->addCssRule(
    ":root",
    array(
        "--logo-height" => get_field("header_logo_max_height", "options") . "px"
    )
);

/**
 * COLORS
 */

$genericCss->addCssRule(
    ":root",
    array(
        "--clr-primary" => get_field("primary_color", "options")["color"],
        "--clr-secondary" => get_field("secondary_color", "options")["color"],
        "--clr-tertiary" => get_field("tertiary_color", "options")["color"],
        "--clr-quaternary" => get_field("quaternary_color", "options")["color"]
    )
);

if (get_field("primary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-primary-2" => get_field("primary_color", "options")["color_2"]
        )
    );
}

if (get_field("secondary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-secondary-2" => get_field("secondary_color", "options")["color_2"]
        )
    );
}

if (get_field("tertiary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-tertiary-2" => get_field("tertiary_color", "options")["color_2"]
        )
    );
}

if (get_field("quaternary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-quaternary-2" => get_field("quaternary_color", "options")["color_2"]
        )
    );
}

/**
 * check if Gradient is set in Theme Colors
 *
 * @param [type] $color
 * @return boolean
 */
function isGradient($color, $gradient)
{
    return getField($color . "_color", "options")["is_gradient"] && $gradient;
}

function getColor($color)
{
    return getField($color . "_color", "options", true, "white");
}

function getBgColor($color, $gradient = false)
{
    if ($color === "white" || $color === "black" || $color === "transparent") return $color;

    if (!isGradient($color, $gradient)) return "var(--clr-$color)";

    $gradient_a = "var(--clr-$color)";
    $gradient_b = "var(--clr-$color-2)";
    return "linear-gradient(45deg, $gradient_a, $gradient_b)";
}

/**
 * TYPOGRAPHY
 */

if (have_rows('font_imports', 'options')) {
    while (have_rows('font_imports', 'options')) : the_row();
        $genericCss->addImport(get_sub_field("font_import"));
    endwhile;
} else {
    $imports = [
        "https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap",
        "https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap",
        "https://fonts.googleapis.com/css2?family=Lato&display=swap",
        "https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap"
    ];
    foreach ($imports as $import) :
        $genericCss->addImport($import);
    endforeach;
}

$genericCss->addCssRule(
    ":root",
    array(
        "--font-main" => getField('font_main', 'options', true, "Lato, sans-serif"),
        "--font-heading" => getField('font_heading', 'options', true, "Playfair Display, serif"),
        "--font-script" => getField('font_script', 'options', true, "Playfair Display, serif"),
        "--fs-xl" => "clamp(" . getField("page_header", "options", true, "2.25rem")["font_size_min"] . "px, 3.5vw, " . getField("page_header", "options", true, "3rem")["font_size_max"] . "px)",
        "--fs-1000" => "clamp(" . getField("heading_1", "options", true, "1.75rem")["font_size_min"] . "px, 3.5vw, " . getField("heading_1", "options", true, "2.25rem")["font_size_max"] . "px)",
        "--fs-900" => "clamp(" . getField("heading_2", "options", true, "1.625rem")["font_size_min"] . "px, 3.5vw, " . getField("heading_2", "options", true, "1.875rem")["font_size_max"] . "px)",
        "--fs-800" => "clamp(" . getField("heading_3", "options", true, "1.5rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_3", "options", true, "1.625rem")["font_size_max"] . "px)",
        "--fs-700" => "clamp(" . getField("heading_4", "options", true, "1.375rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_4", "options", true, "1.375rem")["font_size_max"] . "px)",
        "--fs-600" => "clamp(" . getField("heading_5", "options", true, "1.25rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_5", "options", true, "1.25rem")["font_size_max"] . "px)",
        "--fs-500" => "clamp(" . getField("heading_6", "options", true, "1.125rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_6", "options", true, "1.125em")["font_size_max"] . "px)",
        "--fs-400" => get_field("paragraph", "options")["font_size"] . "px",
        "--fs-300" => "0.9375rem",
        "--fs-200" => "0.875rem",
        "--fs-100" => "0.8125rem"
    )
);

$genericCss->addCssRule(
    ".page-header-title, .hero-title",
    array(
        "color" => get_field("page_header", "options")["font_color"],
        "font-weight" => get_field("page_header", "options")["font_weight"],
        "font-style" => get_field("page_header", "options")["font_style"],
        "font-family" => "var(--font-" . get_field("page_header", "options")["font_family"] . ")",
    )
);

for ($i = 0; $i <= 6; $i++) :
    $heading = get_field("heading_$i", "options");
    switch ($heading['font_family']) {
        case 'heading':
            $font = "var(--font-heading)";
            break;
        case 'script':
            $font = "var(--font-script)";
            break;
        default:
            $font = "var(--font-main)";
    }
    $genericCss->addCssRule(
        "h$i",
        array(
            "font-weight" => $heading["font_weight"],
            "font-style" => $heading["font_style"],
            "font-family" => $font,
            "color"     => $heading['font_color']
        )
    );
endfor;

$genericCss->addCssRule(
    "a, .ui-widget-content a",
    array(
        "color" => getField("anchor_link", "options", true, "var(--clr-primary)")["font_color"],
        "text-decoration" => get_field("anchor_link", "options")["font_style"] ? "underline" : "none"
    )
);

$genericCss->addCssRule(
    "a:hover, a:focus, a:active",
    array(
        "color" => get_field("anchor_link", "options")["hover_styles"]["font_color"],
        "text-decoration" => get_field("anchor_link", "options")["hover_styles"]["font_style"] ? "underline" : "none"
    )
);

/**
 * TABS AND MINISTRY GROUP COLORS
 */
// $genericCss->addCssRule(
//     "tabs-desktop, tabs-mobile",
//     array(
//         "color" => get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_font_color"] : "white",
//     )
// );
// $headingFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_font_color"] : "white";
// $headingBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["heading_background_color"] : "var(--clr-primary)";

// $contentFontColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_font_color"] : "black";
// $contentBackgroundColor = get_field("accordion_colors", "options") ? get_field("accordion_colors", "options")["content_background_color"] : "white";

/**
 * HOMEPAGE COLORS
 */

/** School Stats */
$genericCss->addCssRule(
    ":root",
    array(
        "--stat-icon-color" => get_field("stat_icon_color", "options"),
        "--stat-text-color" => get_field("stat_text_color", "options")
    )
);
/** Top Banner */
$genericCss->addCssRule(
    ".top-banner .the-button",
    array(
        "color" => "var(--clr-" . get_field("top_banner_background_color", "options") .")",
        "border-color" => "1px solid var(--clr-" . get_field("top_banner_text_color", "options") .")",
        "background" => "var(--clr-" . get_field("top_banner_text_color", "options") .")"
    )
);
$genericCss->addCssRule(
    ".top-banner .the-button:hover",
    array(
        "background" => "var(--clr-" . get_field("top_banner_background_color", "options") .")",
        "border" => "1px solid var(--clr-" . get_field("top_banner_text_color", "options") .")",
        "color" => "var(--clr-" . get_field("top_banner_text_color", "options") .")"
    )
);
/** Social Banner */
$genericCss->addCssRule(
    ".social-banner .social-link i",
    array(
        "border-color" => "var(--clr-" . get_field("bottom_banner_text_color", "options") .")"
    )
);
$genericCss->addCssRule(
    ".social-banner .social-link i::before",
    array(
        "color" => "var(--clr-" . get_field("bottom_banner_text_color", "options") .")"
    )
);
/** Calendar */
$genericCss->addCssRule(
    ".calendar-container .simcal-event-details h5",
    array(
        "color" => get_field("calendar_header_text_color", "options")
    )
);
$genericCss->addCssRule(
    ".calendar-container .simcal-event-details p",
    array(
        "color" => get_field("calendar_text_color", "options")
    )
);
$genericCss->addCssRule(
    ".calendar-container .simcal-event",
    array(
        "background" => get_field("calendar_background_color", "options")
    )
);

/**
 * MENU COLORS
 */
$genericCss->addCssRule(
    ":root",
    array(
        "--menu-top-level-default-font-color" => get_field('menu_colors', 'options')['top_level_default']['default_font_color'],
        "--menu-top-level-hover-font-color" => get_field('menu_colors', 'options')['top_level_default']['font_color_hover'],
        "--menu-top-level-default-bg-color" => getBgColor(get_field('menu_colors', 'options')['top_level_default']['default_bg_color'], get_field('menu_colors', 'options')['top_level_default']['default_bg_color_is_gradient']),
        "--menu-top-level-hover-bg-color" => getBgColor(get_field('menu_colors', 'options')['top_level_default']['bg_color_hover'], get_field('menu_colors', 'options')['top_level_default']['bg_color_hover_is_gradient']),
        "--menu-submenu-header-font-color" => get_field('menu_colors', 'options')['submenu_default']['header_font_color'],
        "--menu-submenu-header-font-color-hover" => get_field('menu_colors', 'options')['submenu_default']['header_font_color_hover'],
        "--menu-submenu-default-font-color" => get_field('menu_colors', 'options')['submenu_default']['default_font_color'],
        "--menu-submenu-hover-font-color" => get_field('menu_colors', 'options')['submenu_default']['font_color_hover'],
        "--menu-submenu-default-bg-color" => getBgColor(get_field('menu_colors', 'options')['submenu_default']['default_bg_color'], get_field('menu_colors', 'options')['submenu_default']['default_bg_color_is_gradient']),
        "--menu-submenu-hover-bg-color" => getBgColor(get_field('menu_colors', 'options')['submenu_default']['bg_color_hover'], get_field('menu_colors', 'options')['submenu_default']['bg_color_hover_is_gradient']),

        "--sticky-menu-top-level-default-font-color" => get_field('menu_colors', 'options')['top_level_sticky']['default_font_color'],
        "--sticky-menu-top-level-hover-font-color" => get_field('menu_colors', 'options')['top_level_sticky']['font_color_hover'],
        "--sticky-menu-top-level-default-bg-color" => getBgColor(get_field('menu_colors', 'options')['top_level_sticky']['default_bg_color'], get_field('menu_colors', 'options')['top_level_sticky']['default_bg_color_is_gradient']),
        "--sticky-menu-top-level-hover-bg-color" => getBgColor(get_field('menu_colors', 'options')['top_level_sticky']['bg_color_hover'], get_field('menu_colors', 'options')['top_level_sticky']['bg_color_hover_is_gradient']),
        "--sticky-menu-submenu-header-font-color" => get_field('menu_colors', 'options')['submenu_sticky']['header_font_color'],
        "--sticky-menu-submenu-header-font-color-hover" => get_field('menu_colors', 'options')['submenu_sticky']['header_font_color_hover'],
        "--sticky-menu-submenu-default-font-color" => get_field('menu_colors', 'options')['submenu_sticky']['default_font_color'],
        "--sticky-menu-submenu-hover-font-color" => get_field('menu_colors', 'options')['submenu_sticky']['font_color_hover'],
        "--sticky-menu-submenu-default-bg-color" => getBgColor(get_field('menu_colors', 'options')['submenu_sticky']['default_bg_color'], get_field('menu_colors', 'options')['submenu_sticky']['default_bg_color_is_gradient']),
        "--sticky-menu-submenu-hover-bg-color" => getBgColor(get_field('menu_colors', 'options')['submenu_sticky']['bg_color_hover'], get_field('menu_colors', 'options')['submenu_sticky']['bg_color_hover_is_gradient']),

        "--sidebar-top-level-default-font-color" => get_field('menu_colors', 'options')['top_level_sidebar']['default_font_color'],
        "--sidebar-top-level-hover-font-color" => get_field('menu_colors', 'options')['top_level_sidebar']['font_color_hover'],
        "--sidebar-top-level-default-bg-color" => getBgColor(get_field('menu_colors', 'options')['top_level_sidebar']['default_bg_color'], get_field('menu_colors', 'options')['top_level_sidebar']['default_bg_color_is_gradient']),
        "--sidebar-top-level-hover-bg-color" => getBgColor(get_field('menu_colors', 'options')['top_level_sidebar']['bg_color_hover'], get_field('menu_colors', 'options')['top_level_sidebar']['bg_color_hover_is_gradient']),
        "--sidebar-submenu-default-font-color" => get_field('menu_colors', 'options')['submenu_sidebar']['default_font_color'],
        "--sidebar-submenu-hover-font-color" => get_field('menu_colors', 'options')['submenu_sidebar']['font_color_hover'],
        "--sidebar-submenu-default-bg-color" => getBgColor(get_field('menu_colors', 'options')['submenu_sidebar']['default_bg_color'], get_field('menu_colors', 'options')['submenu_sidebar']['default_bg_color_is_gradient']),
        "--sidebar-submenu-hover-bg-color" => getBgColor(get_field('menu_colors', 'options')['submenu_sidebar']['bg_color_hover'], get_field('menu_colors', 'options')['submenu_sidebar']['bg_color_hover_is_gradient']),
    )
);

/**
 * FOOTER COLORS
 */
/** Footer */
$genericCss->addCssRule(
    "footer",
    array(
        "background-color" => get_field("footer_bg_color", "options")
    )
);

// $genericCss->addCssRule(
//     "footer, footer h1, footer h2, footer h3, footer h4, footer h5, footer h6",
//     array(
//         "background-color" => get_field("footer_bg_color", "options"),
//         "color" => get_field("footer_font_color", "options")
//     )
// );

$genericCss->addCssRule(
    "footer a",
    array(
        "color" => get_field("footer_link_color", "options"),
        "text-decoration" => get_field("footer_link_text_decoration", "options")
    )
);

$genericCss->addCssRule(
    "footer a:hover",
    array(
        "color" => get_field("footer_link_color_hover", "options"),
        "text-decoration" => get_field("footer_link_text_decoration_hover", "options")
    )
);

/** Site Info */
$genericCss->addCssRule(
    "footer .site-info",
    array(
        "background-color" => get_field("site_info_bg_color", "options"),
        "color" => get_field("site_info_font_color", "options")
    )
);

$genericCss->addCssRule(
    "footer .site-info-container a",
    array(
        "color" => get_field("site_info_link_color", "options"),
        "text-decoration" => get_field("site_info_link_text_decoration", "options")
    )
);

$genericCss->addCssRule(
    "footer .site-info-container a:hover",
    array(
        "color" => get_field("site_info_link_color_hover", "options"),
        "text-decoration" => get_field("site_info_link_text_decoration_hover", "options")
    )
);

$genericCss->addCssRule(
    "footer .site-info .heart",
    array(
        "color" => get_field("site_info_heart_color", "options")
    )
);

/**
 * Buttons
 */
$genericCss->addCssRule(
    ":root",
    array(
        "--button-background-color" => get_field("button_background_color", "options"),
        "--button-font-color" => get_field("button_font_color", "options"),
        "--button-border-color" => get_field("button_border_color", "options"),
        "--button-background-color-hover" => get_field("button_background_color_hover", "options"),
        "--button-font-color-hover" => get_field("button_font_color_hover", "options"),
        "--button-border-color-hover" => get_field("button_border_color_hover", "options"),
    )
);

//Generate File
$genericCss->generateCssFile();
