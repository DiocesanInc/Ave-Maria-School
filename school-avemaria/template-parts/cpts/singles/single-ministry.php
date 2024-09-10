<?php

/**
 * Template part for displaying single pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

$group = get_the_terms(get_post(), "ministry-group");
$group = $group[0];

$contacts = MinistriesController::getStaffMembersByMinistry();
?>

    <div class="the-content" <?php echo TemplateController::animate("fade"); ?>>
        <?php the_content(); ?>

    </div>
<?php if ($contacts) : ?>
<div class="contact-persons-container">
    <?php foreach ($contacts as $contact) : ?>
    <?php
            $c = $contact["contact"];
            $isStaff = $contact["is_staff"];
            $image = $isStaff ? get_the_post_thumbnail_url($c) : "";
            $name = $isStaff ? $c->post_title : $contact["contact_name"];
            $position = $isStaff ? get_field("position", $c) : "Position";
            $phone = $isStaff ? get_field("phone", $c) : $contact["contact_phone_number"];
            $email = $isStaff ? get_field("email", $c) : $contact["contact_email"];
            ?>
    <div class="contact-person-wrapper staff-single teaser-box flex-column">
        <?php if ($image) : ?>
        <div class="contact-image">
            <a href="<?php the_permalink(); ?>"><img src="<?php echo $image; ?>" class="staff-image teaser-img" alt="<?php echo $name; ?>" /></a>
        </div>
        <?php endif; ?>

        <div class="teaser-content-wrapper flex-column">
            <?php if ($name) : ?>
                <h4 class="staff-name teaser-title">
                    <?php echo $name; ?>
                </h4>
                <?php endif; ?>

                <?php if ($position) : ?>
                <h5 class="staff-position teaser-title">
                    <?= $position; ?>
                </h5>
                <?php endif; ?>
                <div class="teaser-content">
                    <div class="contact-person-email">
                        <?php if ($email) : ?>
                        <a href="mailto: <?= ($email); ?>" class="">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <?php endif; ?>
                        <?php if ($phone) : ?>
                        <a href="<?php echo phone_link($phone); ?>" class="">
                            <i class="fa fa-phone"></i>
                        </a>
                        <?php endif; ?>
                    </div>

                </div>
          </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
