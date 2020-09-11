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

    <?php
        /*
        <div class="row debug">
            <div class="col-1">Col 1</div>
            <div class="col-1-2">Col 1/2</div>
            <div class="col-1-3 offset-1-4">Col 1/3</div>
            <div class="col-1-4">Col 1/4</div>
            <div class="col-1-5">Col 1/5</div>
            <div class="col-5-12">Col 5/12</div>
            <div class="col-7-12">Col 7/12</div>
        </div>
        */
    ?>
</main>
<?php get_footer(); ?>