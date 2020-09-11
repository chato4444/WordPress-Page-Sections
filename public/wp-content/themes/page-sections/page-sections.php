<?php
/**
 * Template Name: Page Sections
 */
?>

<?php get_header(); ?>
    <main role="main" class="page-sections">

        <?php
        /**
         * Loop through ACF Flexible Content (page_section) layouts
         * and include corresponding section templates
         */
        ?>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>
                <?php if ( have_rows( 'page_sections' ) ) : ?>

                    <?php while ( have_rows( 'page_sections' ) ) : ?>
                        <?php the_row(); ?>
                        <?php if ( ! empty( get_row_layout() ) ) : ?>
                            <?php
                            /**
                             * Row layouts must have identifiers with matching template names in
                             * /template-parts/sections/
                             */
                            ?>
                            <?php get_template_part( 'template-parts/page-sections/' . get_row_layout() ); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>