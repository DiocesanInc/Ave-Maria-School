<?php

/**
 * Block Name: Image Banner
 * This is the template that displays the Image Banner block.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package dpiChild
 */
?>

<?php
// create id attribute for specific styling
$id = 'image-banner-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? ' align' . $block['align'] : '';

if (get_field('image_banner_background')) :
    $bkgd = get_field('image_banner_background')['sizes']['featured'] ? get_field('image_banner_background')['sizes']['featured']  : get_field('image_banner_background')['url'];
?>
<section class="banner<?= !get_field('bottom_padding') ? ' no-bottom' : ''; ?>"
    style="background-image: url(<?php echo $bkgd; ?>)" id="<?php echo $id; ?>">
    <?php else : ?>
    <section class="banner has-primary-background-color" id="<?php echo $id; ?>">
        <?php endif; ?>
        <div class="banner-wrap" data-aos="fade-up">

            <?php if (get_field('image_banner_title')) : ?>
            <h6 class="sub-heading has-white-color font-main <?= $align_class;?>">
                <?php echo get_field('image_banner_title'); ?>
            </h6>
            <?php endif; ?>

            <?php if (get_field('image_banner_content')) : ?>
            <h2 class="heading has-white-color font-header <?= $align_class;?>">
                <?php echo get_field('image_banner_content'); ?>
            </h2>
            <?php endif; ?>

            <?php if (have_rows('image_banner_buttons')) : ?>
            <div class="buttons">
                <?php while (have_rows('image_banner_buttons')) : the_row();
                        echo acf_link(get_sub_field('button'), 'button button-white');
                    endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>


    <style type="text/css">
    #<?php echo "$id";

    ?> {
        padding: 2rem;
        box-shadow: 0 20px 25px #293d4729;
        border-radius: 10px;
        position: relative;
    }

    #<?php echo "$id .no-bottom";

    ?> {
        margin-bottom: -1.5rem;
    }

    #<?php echo "$id::before";

    ?> {
        position: absolute;
        content: "";
        background: #000000;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0.25;
        border-radius: 10px;
    }

    #<?php echo "$id .banner-wrap";

    ?> {
        position: relative;
    }
    #<?php echo "$id .banner-wrap .alignright";
    ?> {
        display: block;
        text-align: right;
        float: none;
    }
    #<?php echo "$id .banner-wrap .aligncenter";
    ?> {
        display: block;
        text-align: center;
        float: none;
    }
    #<?php echo "$id .banner-wrap .alignleft";
    ?> {
        display: block;
        text-align: left;
        float: none;
    }
    </style>
