<?php

/**
 * Block Name: Image Button
 * This is the template that displays the Image Button block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package dpiChild
 */
?>

<?php
// create id attribute for specific styling
$id = 'image-buttons-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? ' align' . $block['align'] : '';

// values from ACF
if (get_field('is_manual')) {
    $bkgd   = get_field('bkgd')['url'] ?? '';
    $link   = get_field('link') ?? '';
    $target = $link['target'] ?? '';
    $title  = $link['title'] ?? '';
    $url    = $link['url'] ?? '';
} else {
    $page   = get_field('page');
    $bkgd   = get_the_post_thumbnail_url($page->ID) ? get_the_post_thumbnail_url($page->ID) : get_field('default_featured_image','options');
    $target = '';
    $title  = get_the_title($page->ID);
    $url    = get_permalink($page->ID);
}
?>

<a href="<?php echo $url; ?>" class="button-link image-button-block<?php echo $align_class; ?>"
    target="<?php echo $target; ?>" title="<?php echo $title; ?>" id="<?php echo $id; ?>"
    style="background-image: url(<?php echo $bkgd; ?>)">
    <h1 class="button-title has-white-color">
        <?php echo $title; ?>
    </h1>
</a>

<style type="text/css">
#<?php echo "$id";

?> {
    position: relative;
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    float: left;
    align-items: center;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    text-decoration: none;
    width: 100%;
    height: 17rem;
    padding: 0 0.5rem;
    margin-top: 1.75rem;
    /* margin-bottom: 1.75rem; */
    border-radius: 10px;
    box-shadow: 0 20px 25px #293d4729;
}

#<?php echo "$id *";

?> {
    z-index: 1;
}

#<?php echo "$id .button-title";

?> {
    text-align: center;
    padding: 0 0.25rem;
}

#<?php echo "$id::after";

?> {
    position: absolute;
    content: "";
    background: #000000;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0.5;
    transition: opacity 0.25s ease-in;
    border-radius: 10px;
}

#<?=$id;
?>:hover::after,
#<?=$id;

?>:focus::after {
    opacity: 0.75;
}

@media screen and (min-width: 768px) {
    #<?=$id;

    ?> {
        width: calc(50% - 0.875rem);
    }

    #<?=$id;

    ?>:nth-of-type(odd) {
        margin-right: 1.75rem;
    }

    #<?=$id;

    ?>:nth-of-type(even) {
        margin-right: 0;
    }
}

@media screen and (min-width: 1200px) {
    #<?=$id;

    ?> {
        width: calc((100% / 3) - 1.25rem);
        margin-right: 1.75rem;
    }

    #<?=$id;

    ?>:nth-of-type(odd),
    #<?=$id;

    ?>:nth-of-type(even) {
        margin-right: 1.75rem;
    }

    #<?php echo "$id:nth-of-type(3n)";
    ?>,
    #<?php echo "$id:last-of-type";

    ?> {
        margin-right: 0;
    }
}
</style>
