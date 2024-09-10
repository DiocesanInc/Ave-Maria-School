<?php

/**
 * The template for displaying a single ministry group.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

$staffMembers = MinistriesController::getStaffMembersByMinistry();
?>
<div class="teaser-box flex-column" <?php echo TemplateController::animate("fade-up"); ?>>
    <img class="teaser-img" src="<?php the_post_thumbnail_url(); ?>" />
    <div class="teaser-content-wrapper flex-column full-height">
        <h3 class="teaser-title"><?php the_title() ?></h3>
        <div class="teaser-content">
            <div class="excerpt">
                <?php echo TemplateController::excerpt() ?>
            </div>
            <div class="contact-persons">
                <?php foreach ($staffMembers as $staffMember) :
                    $staff = $staffMember["contact"];
                    $name = $staff->post_title;
                    $email = get_field("email", $staff);
                    $phone = get_field("phone", $staff);
                    ?>
                <div class="contact-person">
                    <h5 class="contact-person-name">
                        <?php echo $name; ?>
                    </h5>

                    <?php if ($email) : ?>
                    <div class="contact-person-email">
                        <a href="mailto: <?php echo $email; ?>" class="has-underline-hover">
                            <i class="fa fa-envelope"></i>
                            <?php echo $email; ?>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if ($phone) : ?>
                    <div class="contact-person-phone">
                        <a href="<?php echo phone_link($phone); ?>" class="has-underline-hover">
                            <i class="fa fa-phone"></i>
                            <?php echo $phone; ?>
                        </a>
                    </div>
                    <?php endif; ?>


                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="links-container">
            <a href="<?php the_permalink() ?>"
                class="the-button" target=""
                title="Homepage" tabindex="0">Read More
            </a>
        </div>
    </div>
</div>