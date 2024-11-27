<?php

/**
 * Functions to be called that enhance the theme by hooking into WordPress.
 *
 * @package Celine
 */

use Celine\Theme\Controllers\TemplateController;

if (!function_exists('phone_link')) {
    /**
     * Convert phone numbers into links.
     *
     * @param string $input.
     * @return string $output.
     */
    function phone_link($input)
    {
        $tel = preg_replace('/[^0-9]+/', '', $input);
        $output = "tel:+1-" . substr($tel, 0, 3) . "-" . substr($tel, 3, 3) . "-" . substr($tel, 6, 4);
        if (strlen($tel) > 10) $output .= "," . substr($tel, 10);

        return $output;
    }
}

if (!function_exists('acf_link')) {
    /**
     * Create simple links from ACF Link Array.
     *
     * @param string $link    the href for the a tag
     * @param string $class   css classes for the a tag
     * @param string $content content between the opening and closing tag
     * @param bool   $button  make the a tag a button tag instead
     *
     * @return string
     */
    function acf_link($link, $class = null, $content = null, $button = null)
    {
        if ($link) {
            $tag = $button ? "button" : "a";
            $url = is_array($link) && $link['url'] ? $link['url'] : $link;
            $target = is_array($link) && $link["target"] ? $link['target'] : '';
            $title = is_array($link) ? ($link['title'] !== "" ? $link["title"] : "Read more") : $link;

            $className = $class ? " class=\"$class\"" : '';
            $content = $content ? $content : $title;

            return "<$tag href=\"$url\"$className target=\"$target\" title=\"$title\">$content</$tag>";
        }
    }
}

if (!function_exists('if_the_content')) {
    /**
     * Conditionally render .the-content if it exists.
     *
     * @param boolean $limit_width.
     * @return string.
     */
    function if_the_content($limit_width = false)
    {
        $output = '';

        if (have_posts()) :
            while (have_posts()) : the_post();
                if (get_the_content()) :
                    if ($limit_width) :
                        $output = "<div class=\"the-content limit-width\">" . get_the_content() . "</div>";
                    else :
                        $output = "<div class=\"the-content\">" . get_the_content() . "</div>";
                    endif;
                endif;
            endwhile;
        endif;
        wp_reset_postdata();

        return $output;
    }
}

if (!function_exists('ministry_featured_image')) {
    /**
     * Return a Featured Image for Ministries, with multiple fallbacks.
     *
     * @param integer $id.
     * @return string.
     */
    function ministry_featured_image($id = null)
    {
        if (has_post_thumbnail($id)) {
            return get_the_post_thumbnail_url($id);
        } elseif (get_field('ministry_featured_image', 'options') && get_field('ministry_featured_image', 'options')['url']) {
            return get_field('ministry_featured_image', 'options')['url'];
        } else {
            return get_field('default_featured_image', 'options')['url'];
        }
    }
}

if (!function_exists('ministry_taxonomy_image')) {
    /**
     * Return a Taxonomy Image for Ministries, with multiple fallbacks.
     *
     * @param integer $id.
     * @return string.
     */
    function ministry_taxonomy_image($q_obj = null)
    {
        $q_obj = $q_obj === null ? get_queried_object() : $q_obj;
        if (get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)) {
            return get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)['url'] ? get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)['url'] : get_field('ministry_featured_image', 'options')['url'];
        } else {
            return get_field('ministry_featured_image', 'options') ? get_field('ministry_featured_image', 'options')['url'] : get_field('default_featured_image', 'options');
        }
    }
}

if (!function_exists("add_search_form")) {
    function add_search_form($items, $args)
    {
        if ($args->theme_location == 'menu-2') {
            $newItems = '<li class="mega-menu-item">'
                . '<i class="header-search fa fa-search"></i>'
                . '</li>';
            $items = $items . $newItems;
        }
        return $items;
    }
    add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
}
if (!function_exists("add_search_form_mobile")) {
    function add_search_form_mobile($items, $args)
    {
        if ($args->theme_location == 'menu-1') {
            $newItems = '<li class="mega-menu-item mega-menu-search">'
                . '<i class="close-mobile fa"></i>'
                . '<i class="header-search fa fa-search"></i>'
                . '</li>';
            $items = $newItems . $items;
        }
        return $items;
    }
    add_filter('wp_nav_menu_items', 'add_search_form_mobile', 10, 2);
}


if (!function_exists("my_form_submit_button")) {
    function my_form_submit_button($button, $form)
    {
        $fragment = WP_HTML_Processor::create_fragment($button);
        $fragment->next_token();
        $fragment->add_class('the-button');

        return $fragment->get_updated_html();
    }
    add_filter('gform_submit_button', 'my_form_submit_button', 10, 2);
}


/**
 * Add page attributes to post
 */
function mytheme_add_post_attributes()
{
    add_post_type_support('post', 'page-attributes');
}
add_action('admin_init', 'mytheme_add_post_attributes', 500);
// --------- ordering boxes --------------------------------------------------------------

// add_action( 'admin_init', 'dimension_posts_order' );
//
//
// // add  order to posts aka "front boxes"
// function dimension_posts_order() {
//     add_post_type_support( 'post', 'page-attributes' );
// }

// Sort posts in posts view by menu_order in ascending or descending order.
// h/t http://wordpress.stackexchange.com/questions/66455/how-to-change-order-of-posts-in-admin

add_action('manage_posts_custom_column',  'dimension_columns_show_columns');


// add post order to posts aka "front boxes"
function dimension_columns_show_columns($name)
{
    global $post;

    switch ($name) {
        case 'order':
            $views = $post->menu_order;
            echo $views;
            break;
    }
}


// organize the admin view; removed date / category, insert slide order columns
// h/t http://stackoverflow.com/questions/27602116/how-to-add-order-column-in-page-admin-wordpress

if (is_admin()) {
    add_action('pre_get_posts', 'custom_post_order');
}

function custom_post_order($query)
{
    /*
                Set post types.
                _builtin => true returns WordPress default post types.
                _builtin => false returns custom registered post types.
            */
    $post_types = get_post_types(array('_builtin' => true), 'names');
    /* The current post type. */
    $post_type = $query->get('post_type');
    /* Check post types. */
    if (in_array($post_type, $post_types)) {
        /* Post Column: e.g. title */
        if ($query->get('orderby') == '') {
            $query->set('orderby', 'menu_order');
        }
        /* Post Order: ASC / DESC */
        if ($query->get('order') == '') {
            $query->set('order', 'ASC');
        }
    }
}



add_filter('manage_posts_columns', 'dimension_columns');

function dimension_columns($columns)
{

    $dimension_columns = array();

    foreach ($columns as $key => $value) {

        if ($key != 'date' and $key != 'categories') $dimension_columns[$key] = $value;
        if ($key == 'title') {
            $dimension_columns['order'] = ' Box Order';
        }
    }

    return $dimension_columns;
}
/**
 * Add the menu_order property to the post object being saved
 *
 * @param \WP_Post|\stdClass $post
 * @param WP_REST_Request $request
 *
 * @return \WP_Post
 */
function mytheme_pre_insert_post($post, \WP_REST_Request $request)
{
    $body = $request->get_body();
    if ($body) {
        $body = json_decode($body);
        if (isset($body->menu_order)) {
            $post->menu_order = $body->menu_order;
        }
    }

    return $post;
}
add_filter('rest_pre_insert_post', 'mytheme_pre_insert_post', 12, 2);


/**
 * Load the menu_order property for frontend display in the admin
 *
 * @param \WP_REST_Response $response
 * @param \WP_Post $post
 * @param \WP_REST_Request $request
 *
 * @return \WP_REST_Response
 */
function mytheme_prepare_post(\WP_REST_Response $response, $post, $request)
{
    $response->data['menu_order'] = $post->menu_order;

    return $response;
}
add_filter('rest_prepare_post', 'mytheme_prepare_post', 12, 3);

if (!function_exists('array_sort_by_column')) {
    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        array_multisort($sort_col, $dir, $arr);
    }
}

add_action(
    "acf/save_post",
    function () {
        TemplateController::generateThemeJson();
    }
);

require_once get_template_directory() . '/blocks/index.php';


// Add second featured image
add_action('add_meta_boxes', 'listing_image_add_metabox');
function listing_image_add_metabox()
{
    add_meta_box('listingimagediv', __('Page Header Image', 'text-domain'), 'listing_image_metabox', 'post', 'side', 'low');
}

function listing_image_metabox($post)
{
    global $content_width, $_wp_additional_image_sizes;

    $image_id = get_post_meta($post->ID, '_listing_image_id', true);

    $old_content_width = $content_width;
    $content_width = 254;

    if ($image_id && get_post($image_id)) {

        if (! isset($_wp_additional_image_sizes['post-thumbnail'])) {
            $thumbnail_html = wp_get_attachment_image($image_id, array($content_width, $content_width));
        } else {
            $thumbnail_html = wp_get_attachment_image($image_id, 'post-thumbnail');
        }

        if (! empty($thumbnail_html)) {
            $content = $thumbnail_html;
            $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button" >' . esc_html__('Remove page header image', 'text-domain') . '</a></p>';
            $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="' . esc_attr($image_id) . '" />';
        }

        $content_width = $old_content_width;
    } else {

        $content = '<img src="" style="width:' . esc_attr($content_width) . 'px;height:auto;border:0;display:none;" />';
        $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__('Set page header image', 'text-domain') . '" href="javascript:;" id="upload_listing_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__('Choose an image', 'text-domain') . '" data-uploader_button_text="' . esc_attr__('Set page header image', 'text-domain') . '">' . esc_html__('Set page header image', 'text-domain') . '</a></p>';
        $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="" />';
    }

    echo $content;
}

add_action('save_post', 'listing_image_save', 10, 1);
function listing_image_save($post_id)
{
    if (isset($_POST['_listing_cover_image'])) {
        $image_id = (int) $_POST['_listing_cover_image'];
        update_post_meta($post_id, '_listing_image_id', $image_id);
    }
}


function wpdocs_selectively_enqueue_admin_script($hook)
{
    // echo '<h1 style="color: crimson;">' . esc_html( $hook ) . '</h1>';
    if ('post.php' != $hook) {
        return;
    }
    wp_enqueue_script('secondimage', get_template_directory_uri() . '/assets/js/secondary-image.js', array(), '1.0');
}
add_action('admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script');
