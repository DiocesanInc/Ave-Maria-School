<?php

/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

</div><!-- #content -->
<?php $fontColor = TemplateController::getFontColor("footer"); ?>
<?php $bgColor = TemplateController::getBackgroundColor("footer"); ?>
<footer class="site-footer <?php echo "$bgColor $fontColor"?>" id="colophon">
    <?php get_template_part("template-parts/footers/footer", "container"); ?>
    <script>
    AOS.init();
    AOS.refresh();
    </script>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
